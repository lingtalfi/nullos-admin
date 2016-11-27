<?php

namespace Crud;

use QuickPdo\QuickPdo;


class DataTable
{

    // unlikely to change
    public $pageGetKey;
    public $nbItemsPerPageGetKey;
    public $sortColumnGetKey;
    public $sortColumnDirGetKey;
    public $searchGetKey;


    public $nbItemsPerPage;
    public $nbItemsPerPageList;
    public $sortColumn;
    public $sortColumnDir;


    // likely to change
    /**
     * searchColumns: null(default)|array,
     *          - if it's an array, it's an array of concrete columns names (v.id...)
     *          - if it's an empty array, no search will be performed
     *          - if it's null, it will be populated with all the columns from the fields property
     */
    public $searchColumns;

    /**
     * array of <column alias> => label,
     * use this to override all or some of the column headers.
     */
    public $columnHeaders;
    /**
     * array of <columns alias> to hide from view.
     * Note: the columns are kept in the html (because they might be useful to target a row)
     * but hidden from the view via css.
     */
    public $hiddenColumns;


    /**
     * If it's null, it's not displayed.
     */
    public $title;


    //
    /**
     * it might be required (someday) that the user updates the ricSeparator;
     * but for the most part, it separates only integers.
     */
    private $ricSeparator;
    private $widgets;

    /**
     * array of actionId => [label, function]
     *
     * - the actionId is passed via http to internally identify the appropriate multiple action
     * - the label is displayed in the multiple actions selector (gui)
     * - the function is called when a multiple action is requested.
     *          It receives two arguments: the table and the rics argument, which is an array of ricValue.
     *          A ricValue is an array which keys are the name of the row identifying columns,
     *          and the values are the actual values corresponding to those columns.
     *
     *
     */
    private $multipleActions;
    /**
     * array of actionId => function
     *          The function is responsible for executing the action.
     *          It accepts two arguments:
     *                  - table: string, the table name
     *                  - ric: array of key => value (identifying the row on which the action should be executed)
     *                  - confirmation=false: whether or not a confirmation dialog should be displayed before actually executing the action
     */
    private $singleActions;

    /**
     * array of <column alias> => callback,
     *       The callback accepts the following arguments:
     *              - value: mixed, the value of the column
     *              - item: array of key => value, it represents the row
     */
    private $transformers;

    private $translatorContext;


    public function __construct()
    {
        $this->translatorContext = 'datatable';


        $this->tableGetKey = "name";
        $this->pageGetKey = "page";
        $this->nbItemsPerPageGetKey = "nipp";
        $this->sortColumnGetKey = "sort";
        $this->sortColumnDirGetKey = "dir";
        $this->searchGetKey = "search";


        //
        $this->nbItemsPerPage = 50;
        $this->sortColumn = null;
        $this->sortColumnDir = null;
        $this->nbItemsPerPageList = [5, 10, 25, 50, 100, 250, 'all']; // all is a special value


        //
        $this->title = null;

        $this->widgets = [
            'newItemLink' => true,
            'pageSelector' => true,
            'search' => true,
            'nippSelector' => true,
            'pagination' => true,
            'multipleActions' => true,
        ];

        $this->multipleActions = [
            'deleteAll' => [
                __('Delete all', $this->translatorContext),
                ':deleteAll', // this is a special notation to indicate that we want to use the deleteAll method of THIS class
                true, // whether or not this action requires javascript confirmation
            ],
        ];


        /**
         * The concept of postlink is important to understand.
         * A postlink is a fake link bound to a specific row. It actually does the following when clicked upon:
         *
         * - it posts a form containing the following fields:
         *      - action: the action to execute.
         *                  In this scenario, actions are handled by this class, using the actions (not multiple actions) handler.
         *                  The value of the action  must be passed via the link's data-action attribute.
         *      - id: the ric of the row on which to execute the action
         *                  The value of the ric must be passed via the link's data-ric attribute.
         *
         *      The action (destination) of the posted form is the same as the current url,
         *      including the query string (so that we can delete one row without interrupting our workflow).
         *
         *
         */
        $this->singleActions = [
            'edit' => ['<a class="action-link" href="/table?name={tableName}&action=edit&ric={ric}">' . __('Edit', $this->translatorContext) . '</a>'],
            // :delete is a special notation to indicate that we want to use the delete method of THIS class
            'delete' => ['<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">' . __('Delete', $this->translatorContext) . '</a>', ':delete'],
        ];


        //
        $this->ricSeparator = \Spirit::get('ricSeparator');
        $this->hiddenColumns = [];
        $this->transformers = [];


    }


    /**
     * ric: row identifying columns
     *          the array of columns which identify a unique row.
     *          This is used to delete/edit a specific row.
     *
     */
    public function printTable($table, $query, $fields, array $ric)
    {

        //--------------------------------------------
        // HANDLING POST
        //--------------------------------------------
        if (array_key_exists('multiple-action', $_POST)) {
            if (array_key_exists('ids', $_POST) && is_array($_POST['ids'])) {

                $multipleAction = $_POST['multiple-action'];
                if (array_key_exists($multipleAction, $this->multipleActions)) {


                    $ids = $_POST['ids'];
                    $rics = array_map(function ($v) use ($ric) {
                        $vals = explode($this->ricSeparator, $v);
                        return array_combine($ric, $vals);
                    }, $ids);
                    $actionInfo = $this->multipleActions[$multipleAction];
                    $callback = $actionInfo[1];

                    if (':deleteAll' === $callback) {
                        $callback = [$this, "deleteAll"];
                    }
                    call_user_func($callback, $table, $rics);

                }
            }
        } else if (array_key_exists('action', $_POST) && array_key_exists('ric', $_POST)) {
            $action = $_POST['action'];
            if (array_key_exists($action, $this->singleActions)) {
                $_ric = (string)$_POST['ric'];
                $vals = explode($this->ricSeparator, $_ric);
                $_ric = array_combine($ric, $vals);
                $callback = $this->singleActions[$action][1];
                if (null !== $callback) {
                    if (':delete' === $callback) {
                        $callback = [$this, "delete"];
                    }
                    call_user_func($callback, $table, $_ric);
                }
            }
        }


        //--------------------------------------------
        // CREATE THE QUERIES
        //--------------------------------------------
        $markers = [];


        /**
         * Search
         */
        $search = (array_key_exists($this->searchGetKey, $_GET)) ? (string)$_GET[$this->searchGetKey] : '';
        if ('' !== $search) {
            if (null === $this->searchColumns) {
                $searchColumns = $this->getSearchColumnsFromFields($fields);
            } else {
                $searchColumns = $this->searchColumns;
            }


            if (count($searchColumns) > 0) {

                $hasWhere = false;
                if (preg_match('!\swhere\s!i', $query)) {
                    $hasWhere = true;
                }


                $i = 0;
                foreach ($searchColumns as $col) {
                    if (0 === $i) {
                        if (true === $hasWhere) {
                            $query .= " and (";
                        } else {
                            $query .= " where (";
                        }
                    } else {
                        $query .= " or ";
                    }
                    $markerName = "_mk" . $i++;
                    $markers[$markerName] = '%' . str_replace('%', '\%', $search) . '%';
                    $query .= "$col like :" . $markerName;
                }
                $query .= ')';
            }
        }


        /**
         * Pagination...
         */
        $currentPage = (array_key_exists($this->pageGetKey, $_GET)) ? (int)$_GET[$this->pageGetKey] : 1;
        $nbItemsPerPageChoice = (array_key_exists($this->nbItemsPerPageGetKey, $_GET)) ? (int)$_GET[$this->nbItemsPerPageGetKey] : (int)$this->nbItemsPerPage;
        $nbItemsTotal = (int)QuickPdo::fetch(sprintf($query, "count(*) as count"), $markers)['count'];


        $nbPages = 1; // if the user chooses to display all items on the same page...
        if ($nbItemsPerPageChoice > 0) {
            $nbPages = ceil($nbItemsTotal / $nbItemsPerPageChoice);
            if ($nbPages < 1) {
                $nbPages = 1;
            }
            if ($currentPage > $nbPages) {
                $currentPage = (int)$nbPages;
            } else if ($currentPage < 1) {
                $currentPage = 1;
            }
        }


        /**
         * Sort
         */
        $sortColumn = (array_key_exists($this->sortColumnGetKey, $_GET)) ? (string)$_GET[$this->sortColumnGetKey] : $this->sortColumn;
        $sortColumnDir = (array_key_exists($this->sortColumnDirGetKey, $_GET)) ? (string)$_GET[$this->sortColumnDirGetKey] : $this->sortColumnDir;
        $allowedColumns = $this->getSortColumnsFromFields($fields);
        if (null !== $sortColumn && in_array($sortColumn, $allowedColumns, true)) {
            $query .= " order by " . $sortColumn;
            if (null !== $sortColumnDir && in_array($sortColumnDir, ['asc', 'desc'])) {
                $query .= " " . $sortColumnDir;
            }
        }


        /**
         * ...Pagination
         */

        if ($nbItemsPerPageChoice > 0) {
            $offset = ($currentPage - 1) * $nbItemsPerPageChoice;
            $query .= " limit $offset, " . $nbItemsPerPageChoice;
        }


        /**
         * Display the table
         */
        $items = QuickPdo::fetchAll(sprintf($query, $fields), $markers);


        $extraCols = array_map(function ($v) {
            return $v[0];
        }, $this->singleActions);

        $paginationSelectedId = "selected-link-" . rand(0, 10000);
        $tableId = "datatable-" . rand(0, -10000);


        //--------------------------------------------
        // PRINT THE TABLE
        //--------------------------------------------
        $i = 0;
        ?>
        <section id="<?php echo $tableId; ?>" class="datatable-section freepage">

            <?php if (null !== $this->title): ?>
                <h3 class="list-title"><?php echo $this->title; ?></h3>
            <?php endif; ?>


            <?php if ($this->hasWidget('newItemLink')): ?>
            <p class="create-new-item-container">
                <a href="<?php echo CrudHelper::getInsertFormUrl($table); ?>&action=insert"><?php \Icons::printIcon('add', 'blue'); ?>
                    <span><?php echo __("Create a new item", $this->translatorContext); ?></span></a>
            </p>
            <?php endif; ?>


            <?php if (count($items) > 0): ?>


                <div class="toolbar">


                    <?php if ($this->hasWidget('pageSelector')): ?>
                        <form method="get" action="">
                            <?php $this->printHiddenFields('page', $table, $currentPage, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                            <select name="<?php echo $this->pageGetKey; ?>" class="page-selector">
                                <?php for ($i = 1; $i <= $nbPages; $i++):
                                    $sel = ($i === $currentPage) ? ' selected="selected"' : '';
                                    ?>
                                    <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </form>
                    <?php endif; ?>


                    <?php if ($this->hasWidget('search')): ?>
                        <div class="search">
                            <form class="search-form" method="get" action="">
                                <?php $this->printHiddenFields('search', $table, 1, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                                <input name="<?php echo $this->searchGetKey; ?>" class="search-input" type="text"
                                       value="<?php echo htmlspecialchars($search); ?>"
                                       placeholder="<?php echo ___("Search in rows", $this->translatorContext); ?>">
                                <input class="search-submit-btn" type="submit"
                                       value="<?php echo ___("Search", $this->translatorContext); ?>">
                            </form>
                        </div>
                    <?php endif; ?>


                    <?php if ($this->hasWidget('nippSelector')): ?>
                        <div class="nblines_per_page">
                            <form method="get" action="">
                                <span><?php echo __("Number of rows:", $this->translatorContext); ?></span>
                                <?php $this->printHiddenFields('nipp', $table, $currentPage, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice); ?>
                                <select name="<?php echo $this->nbItemsPerPageGetKey; ?>" class="nipp-selected">
                                    <?php foreach ($this->nbItemsPerPageList as $value):
                                        $sel = ((int)$value === (int)$nbItemsPerPageChoice) ? ' selected="selected"' : '';
                                        ?>
                                        <option
                                            <?php echo $sel; ?>
                                            value="<?php echo $value; ?>"><?php echo ucfirst((string)$value); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>


                <form method="post" action="" class="datatable-form">
                    <table class="datatable">
                        <thead>
                        <tr class="headerrow">
                            <td></td>
                            <?php

                            $labels = [];
                            if (is_array($this->columnHeaders)) {
                                $labels = $this->columnHeaders;
                            }

                            foreach ($items[0] as $k => $v):
                                $_hid = ($this->isHidden($k)) ? ' style="display: none"' : "";

                                $dir = ('asc' === $sortColumnDir) ? 'desc' : 'asc';
                                $link = url("/table", [
                                    $this->pageGetKey => 1,
                                    $this->sortColumnGetKey => $k,
                                    $this->sortColumnDirGetKey => $dir,
                                ]);
                                $label = (array_key_exists($k, $labels)) ? $labels[$k] : $k;

                                ?>
                                <td<?php echo $_hid; ?>>
                                    <a href="<?php echo $link; ?>">
                                        <?php echo $label; ?>
                                    </a>
                                </td>
                            <?php endforeach; ?>


                            <?php foreach ($extraCols as $extraCol): ?>
                                <td></td>
                            <?php endforeach; ?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item):
                            $rowUniqueIdentifier = $this->getRowUniqueIdentifier($item, $ric);
                            ?>
                            <tr class="<?php echo (0 === $i++ % 2) ? 'even' : 'odd'; ?>">

                                <td>
                                    <input class="checkbox" type="checkbox" name="ids[]"
                                           value="<?php echo htmlspecialchars($rowUniqueIdentifier); ?>">
                                </td>

                                <?php foreach ($item as $k => $v):
                                    $_hid = ($this->isHidden($k)) ? ' style="display: none"' : "";
                                    ?>
                                    <td<?php echo $_hid; ?>>
                                        <?php

                                        if (array_key_exists($k, $this->transformers)) {
                                            $v = call_user_func($this->transformers[$k], $v, $item);
                                        }

                                        echo $v;
                                        ?>
                                    </td>
                                <?php endforeach; ?>


                                <?php foreach ($extraCols as $extraCol): ?>
                                    <td>
                                        <?php
                                        $link = str_replace([
                                            '{tableName}',
                                            '{ric}',
                                        ], [
                                            $table,
                                            $rowUniqueIdentifier,
                                        ], $extraCol);

                                        echo $link;
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                    <?php if ($this->hasWidget('pagination')): ?>
                        <div class="toolbar bottom-toolbar">
                            <?php if ($nbPages > 1): ?>
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $nbPages; $i++):
                                        $link = url('/table', [
                                            $this->pageGetKey => $i,
                                        ]);

                                        $sel = '';
                                        $id = '';
                                        if ($i === $currentPage) {
                                            $sel = ' class="selected"';
                                            $id = ' id="' . $paginationSelectedId . '"';
                                        }
                                        ?>
                                        <li<?php echo $id; ?>><a <?php echo $sel; ?>
                                                href="<?php echo $link; ?>"><?php echo $i; ?></a></li>
                                    <?php endfor; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                    <?php if ($this->hasWidget('multipleActions')): ?>
                        <div class="multiple-actions">
                            <button class="checkall-btn"><?php echo __("Check all rows", $this->translatorContext); ?></button>
                            <button class="uncheckall-btn hidden"><?php echo __("Uncheck all rows", $this->translatorContext); ?></button>
                            <select class="multiple-action-selector" name="multiple-action">
                                <option value="0"><?php echo __("For all selected rows", $this->translatorContext); ?></option>
                                <?php foreach ($this->multipleActions as $k => $v):
                                    $confirm = (array_key_exists(2, $v) && true === $v[2]) ? ' data-confirm="true"' : '';
                                    ?>
                                    <option <?php echo $confirm; ?>
                                        value="<?php echo $k; ?>"><?php echo $v[0]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                </form>
                <div class="hidden blackhole"></div>

            <?php else: ?>
                <p>
                    <?php echo __("No results for this table", $this->translatorContext); ?>
                </p>
            <?php endif; ?>
        </section>
        <script>

            var tableSection = document.getElementById('<?php echo $tableId ?>');
            var pageSelector = tableSection.querySelector('.page-selector');
            if (pageSelector) { // ensure there is at least one result...
                /**
                 * toolbar
                 */
                var nippSelector = tableSection.querySelector('.nipp-selected');

                var toolbarSubmit = function () {
                    this.parentNode.submit();
                };

                pageSelector.addEventListener('change', toolbarSubmit);
                nippSelector.addEventListener('change', toolbarSubmit);


                /**
                 * Pagination: scroll to the selected element
                 */
                var selected = document.getElementById('<?php echo $paginationSelectedId ?>');
                if (selected) {
                    document.addEventListener('DOMContentLoaded', function () {
                        selected.parentNode.scrollLeft = selected.offsetLeft - 100; // 100 is a safe margin, so that we can click the links on the left.
                    });
                }

                /**
                 * Check all button
                 */
                var checkAllBtn = tableSection.querySelector('.checkall-btn');
                var uncheckAllBtn = tableSection.querySelector('.uncheckall-btn');

                var table = tableSection.querySelector(".datatable");
                checkAllBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    [].forEach.call(table.querySelectorAll(".checkbox"), function (el) {
                        el.checked = true;
                    });
                    checkAllBtn.classList.add('hidden');
                    uncheckAllBtn.classList.remove('hidden');
                });
                uncheckAllBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    [].forEach.call(table.querySelectorAll(".checkbox"), function (el) {
                        el.checked = false;
                    });
                    checkAllBtn.classList.remove('hidden');
                    uncheckAllBtn.classList.add('hidden');
                });


                /**
                 * Multiple action
                 */
                var tableForm = tableSection.querySelector('.datatable-form');
                var multiActionSelector = tableSection.querySelector(".multiple-action-selector");
                multiActionSelector.addEventListener('change', function () {

                    var option = multiActionSelector.options[multiActionSelector.selectedIndex];
                    if (option.hasAttribute('data-confirm') && 'true' === option.getAttribute('data-confirm')) {
                        if (true === window.confirm("<?php echo \Helper::jsQuote(__("Are you sure you want to execute this action on all the selected rows?", $this->translatorContext)); ?>")) {
                            tableForm.submit();
                        }
                    }
                    else {
                        tableForm.submit();
                    }
                });

                /**
                 * Handling datatable single actions
                 */
                var blackhole = tableSection.querySelector(".blackhole");
                table.addEventListener('click', function (e) {

                    if (e.target.classList.contains("confirmlink")) {
                        if (false === window.confirm("<?php echo \Helper::jsQuote(__("Are you sure you want to execute this action?", $this->translatorContext)); ?>")) {
                            e.preventDefault();
                            return; // prevent postlink to execute (delete link for instance)
                        }
                    }


                    if (e.target.classList.contains('postlink')) {


                        var action = e.target.getAttribute('data-action');
                        var ric = e.target.getAttribute('data-ric');


                        var tmpForm = document.createElement('form');
                        tmpForm.setAttribute('method', 'post');


                        var inputAction = document.createElement('input');
                        inputAction.setAttribute('type', 'hidden');
                        inputAction.setAttribute('name', 'action');
                        inputAction.setAttribute('value', action);

                        var inputRic = document.createElement('input');
                        inputRic.setAttribute('type', 'hidden');
                        inputRic.setAttribute('name', 'ric');
                        inputRic.setAttribute('value', ric);

                        tmpForm.appendChild(inputAction);
                        tmpForm.appendChild(inputRic);

                        blackhole.appendChild(tmpForm);
                        tmpForm.submit();


                        e.preventDefault();
                    }
                });

            }
        </script>
        <?php
    }

    /**
     * array of widgetName => bool,
     * by default, all widgets are set to true.
     *
     * The following widgets are available:
     *
     * - pageSelector
     * - search
     * - nippSelector
     * - pagination
     * - multipleActions
     *
     */
    public function customize(array $widgets)
    {
        $this->widgets = $widgets;
        return $this;
    }

    public function customizeWidget($widget, $value)
    {
        $this->widgets[$widget] = $value;
        return $this;
    }


    public function registerSingleAction($id, $html, $function = null)
    {
        $this->singleActions[$id] = [$html, $function];
    }

    public function registerMultipleAction($id, $label, $function, $confirmation = false)
    {
        $this->multipleActions[$id] = [
            $label,
            $function,
            $confirmation,
        ];
    }

    public function setTransformer($column, $function)
    {
        $this->transformers[$column] = $function;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function getRowUniqueIdentifier(array $item, array $ric)
    {
        $s = '';
        $i = 0;
        foreach ($ric as $column) {
            if (0 !== $i) {
                $s .= $this->ricSeparator;
            } else {
                $i++;
            }
            $s .= $item[$column];
        }
        return $s;
    }

    private function getSortColumnsFromFields($fields)
    {
        return array_map(function ($v) {
            $p = explode('.', $v);
            $val = trim(array_pop($p));
            $p = preg_split('/\s+/', $val);
            $val = array_pop($p);
            return trim($val);
        }, explode(',', $fields));
    }

    private function getSearchColumnsFromFields($fields)
    {
        return array_map(function ($v) {
            $v = trim($v);
            $p = preg_split('/\s+/', $v);
            $v = array_shift($p);
            return $v;
        }, explode(',', $fields));
    }

    private function printHiddenFields($exclude, $table, $page, $sortColumn, $sortColumnDir, $search, $nbItemsPerPageChoice)
    {

        ?>
        <input type="hidden" name="<?php echo $this->sortColumnGetKey; ?>"
               value="<?php echo htmlspecialchars($sortColumn); ?>">

        <input type="hidden" name="<?php echo $this->sortColumnDirGetKey; ?>"
               value="<?php echo htmlspecialchars($sortColumnDir); ?>">


        <input type="hidden" name="<?php echo $this->tableGetKey; ?>"
               value="<?php echo htmlspecialchars($table); ?>">


        <?php
        if ('search' !== $exclude): ?>
            <input type="hidden" name="<?php echo $this->searchGetKey; ?>"
                   value="<?php echo htmlspecialchars($search); ?>">
        <?php endif;


        if ('nipp' !== $exclude): ?>
            <input type="hidden" name="<?php echo $this->nbItemsPerPageGetKey; ?>"
                   value="<?php echo $nbItemsPerPageChoice; ?>">
        <?php endif;


        if ('page' !== $exclude): ?>
            <input type="hidden" name="<?php echo $this->pageGetKey; ?>"
                   value="<?php echo $page; ?>">
        <?php endif;
    }

    private function hasWidget($widget)
    {
        return (
            array_key_exists($widget, $this->widgets) &&
            true === $this->widgets[$widget]
        );
    }

    private function deleteAll($table, array $rics)
    {
        $q = "delete from $table where ";
        $markers = [];
        $i = 0;
        foreach ($rics as $ric) {
            if (0 !== $i) {
                $q .= ' or ';
            }
            $q .= "(";
            foreach ($ric as $k => $v) {
                $marker = 'm' . $i++;
                $q .= "$k=:" . $marker;
                $markers[$marker] = $v;
            }
            $q .= ")";
        }
        QuickPdo::freeQuery($q, $markers);
    }


    private function delete($table, $ric)
    {
        $q = "delete from $table where ";
        $markers = [];
        $q .= \Helper::getWhereFragmentFromRic($ric, $markers);
        QuickPdo::freeQuery($q, $markers);
    }

    private function isHidden($col)
    {
        return (in_array($col, $this->hiddenColumns, true));
    }
}