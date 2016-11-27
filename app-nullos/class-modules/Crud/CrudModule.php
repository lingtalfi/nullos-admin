<?php


namespace Crud;


class CrudModule
{

    private static $tables = [];

    public static function registerTables(array $tables)
    {
        self::$tables = $tables;
    }

    public static function displayLeftMenuLinks()
    {
        $prettyTables = CrudConfig::getPrettyTableNames();
        $sections = CrudConfig::getLeftMenuSections();


        foreach ($sections as $label => $tables):
            ?>
            <section class="section-block table-links">
                <h3><?php echo $label; ?></h3>
                <ul class="linkslist">
                    <?php foreach ($tables as $table):
                        $original = $table;
                        if (array_key_exists($table, $prettyTables)) {
                            $table = $prettyTables[$table];
                        } else {
                            if (false !== ($pos = strpos($table, '.'))) {
                                $table = substr($table, $pos + 1);
                            }
                        }
                        ?>
                        <li>
                            <a href="<?php echo CrudHelper::getListUrl($original); ?>"><?php echo ucfirst($table); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
        endforeach;
    }


    /**
     * default DataTable instance for all lists (configure nipp, widgets,...)
     */
    public static function getDataTable()
    {
        return new DataTable();
    }

    /**
     * default Form instance for all forms (configure errorLocation, ...)
     */
    public static function getForm($table, array $ric, $mode = null)
    {
        return new Form($table, $ric, $mode);
    }
}