<?php

use QuickPdo\QuickPdo;


class Form
{

    public $insertDefaults;
    public $controlErrorLocation; // local(default)|top
    public $title; // string(default="$table form")|null, null means no title
    public $labels;
    public $allowMultipleErrorsPerControl;


    private $table;
    private $ric;
    private $mode;
    //
    private $controls;
    private $ricSeparator;
    private $translatorContext;

    public function __construct($table, array $ric, $mode = null)
    {
        $this->table = $table;
        $this->ric = $ric;
        if (null === $mode) {
            $mode = (array_key_exists('ric', $_GET)) ? 'update' : 'insert';
        }
        $this->mode = $mode;
        $this->controls = [];
        $this->labels = [];
        $this->insertDefaults = [];

        /**
         * if this class ever sets the ricSeparator, it should also update the property in the Spirit object,
         * so that both are synced.
         * That's because the ricSeparator is shared between the list and the form features,
         * transiting via the http url.
         */
        $this->ricSeparator = Spirit::get('ricSeparator');
        $this->translatorContext = "form-validation";
        $this->controlErrorLocation = "local";
        $this->title = __("{table} form", "form", ['table' => ucfirst($table)]);

        $this->allowMultipleErrorsPerControl = true;
    }


    /**
     * column: the column to insert/update
     */
    public function addControl($column)
    {
        $c = new FormControl();
        $this->controls[$column] = $c;
        return $c;
    }

    public function display()
    {
        $table = $this->table;

        $updateRowFound = false;
        $atLeastOneControlError = false;
        $dbInteractionIsSuccess = false;
        $dbInteractionMsg = null; // witnesses whether or not the form has been posted

        //--------------------------------------------
        // FORM SUBMITTED
        //--------------------------------------------
        if (array_key_exists('_nullos_form_posted', $_POST)) {

            unset($_POST['_nullos_form_posted']);
            $controlsNames = array_keys($this->controls);
            $safeValues = array_intersect_key($_POST, array_flip($controlsNames));

            //todo:: inect post values into form, redo constring test: with control->getVAlue instead of formatted?
            $formattedValues = [];
            foreach ($safeValues as $k => $v) {
                $formattedValues[$k] = $v;
                $this->controls[$k]->value($v);
            }


            // validation
            $validator = new FormValidator();
            foreach ($this->controls as $columnName => $c) {
                $countErr = 0;
                foreach ($c->getConstraints() as $ruleName => $ruleArgs) {
                    $res = $validator->test($ruleName, $ruleArgs, $c->getValue());
                    if (true !== $res) {
                        if (false === $this->allowMultipleErrorsPerControl && $countErr > 0) {
                            break;
                        }
                        $atLeastOneControlError = true;
                        if (is_string($res)) {
                            $errMsg = __($res, $this->translatorContext);
                        } else {
                            $err = $res[0];
                            $tags = $res[1];
                            $keys = array_map(function ($v) {
                                return '{' . $v . '}';
                            }, array_keys($tags));
                            $values = array_values($tags);
                            $errMsg = str_replace($keys, $values, __($err, $this->translatorContext));
                        }
                        $c->addErrorMessage($errMsg);
                        $countErr++;
                    }
                }
            }


            // submit
            if (false === $atLeastOneControlError) {
                try {

                    /**
                     * Note that below I assume that pdo works in Exception error mode, so that
                     * every error goes to the catch block...
                     */
                    if ('update' === $this->mode) {
                        $ric = $this->getRicArray();
                        $where = [];
                        foreach ($ric as $k => $v) {
                            $where[] = [$k, '=', $v];
                        }
                        QuickPdo::update($this->table, $formattedValues, $where);
                        $dbInteractionIsSuccess = true;
                        $dbInteractionMsg = __("The data has been successfully updated", "form");

                    } else {
                        QuickPdo::insert($this->table, $formattedValues);
                        $dbInteractionIsSuccess = true;
                        $dbInteractionMsg = __("The data has been successfully inserted", "form");
                    }
                } catch (\Exception $e) {
                    $dbInteractionMsg = __("Oops, something went wrong with the database, sorry...", "form");
                    Logger::log($e);
                }
            }


        }


        //--------------------------------------------
        // FEED CONTROLS WITH DEFAULT VALUES
        //--------------------------------------------
        $defaultVals = [];
        if ('update' === $this->mode && array_key_exists('ric', $_GET)) {
            $ric = $this->getRicArray();
            $markers = [];
            $q = "select * from $table where ";
            $q .= Helper::getWhereFragmentFromRic($ric, $markers);
            $item = QuickPdo::fetch($q, $markers);
            if (false !== $item) {
                $updateRowFound = true;
                $defaultVals = $item;
            }
        } elseif ('insert' === $this->mode) {
            $defaultVals = $this->insertDefaults;
        }
        foreach ($defaultVals as $col => $val) {
            if (array_key_exists($col, $this->controls)) {
                $this->controls[$col]->value($val);
            }
        }


        $displayForm = ('update' !== $this->mode || ('update' === $this->mode && true === $updateRowFound));

        $formId = 'form-' . rand(0, 10000);


        ?>

        <script>
            window.onSubmitCallbacks = [];
        </script>

        <section class="form-section freepage">

            <h3 class="form-title"><?php echo $this->title; ?></h3>

            <?php if (null !== $dbInteractionMsg):
                $class = (true === $dbInteractionIsSuccess) ? 'success' : 'error';
                ?>
                <div class="top-db-result <?php echo $class; ?>"><?php echo $dbInteractionMsg; ?></div>
            <?php endif; ?>


            <?php if (true === $atLeastOneControlError && 'top' === $this->controlErrorLocation): ?>
                <div class="top-control-errors">
                    <p>
                        <?php echo __("The form has the following errors, please fix them and resubmit the form", "form"); ?>
                    </p>

                    <?php foreach ($this->controls as $name => $c):
                        $errors = $c->getErrorMessages();
                        $n = count($errors);
                        if ($n > 0): ?>
                            <ul>
                                <li><?php echo ucfirst($this->label($name, $c)) . ': ';
                                    if (1 === $n): ?>
                                        <?php echo $errors[0]; ?>
                                    <?php else: ?>
                                        <ul>
                                            <?php foreach ($errors as $err): ?>
                                                <li><?php echo $err; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php if (true === $displayForm): ?>
                <form class="form" method="post" action="" id="<?php echo $formId; ?>">
                    <?php
                    foreach ($this->controls as $column => $c) {
                        ?>
                        <div class="row">
                            <span class="label"><?php echo ucfirst($this->label($column, $c)); ?></span>
                            <div class="control">
                                <?php $this->displayControl($column, $c); ?>
                            </div>
                        </div>

                        <?php
                        if ('local' === $this->controlErrorLocation):
                            $errors = $c->getErrorMessages();
                            if (count($errors) > 0):
                                ?>
                                <div class="row error">
                                    <span class="label"></span>
                                    <div>
                                        <?php foreach ($errors as $msg): ?>
                                            <p><?php echo $msg; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endif;
                    }
                    ?>
                    <input type="hidden" name="_nullos_form_posted" value="1">


                    <div class="submit">
                        <input class="input-submit autowidth" value="Submit" type="submit">
                    </div>

                </form>
            <?php else: ?>
                <p class="error">
                    Cannot access the record in database.
                </p>
            <?php endif; ?>
        </section>


        <script>

            var form = document.getElementById('<?php echo $formId; ?>');
            var submitBtn = form.querySelector('.input-submit');
            submitBtn.addEventListener('click', function (e) {

                if (window.onSubmitCallbacks.length > 0) {
                    e.preventDefault();
                    var count = window.onSubmitCallbacks.length;
                    var done = function () {
                        count--;
                        if (0 === count) {
                            form.submit();
                        }
                    };
                    window.onSubmitCallbacks.forEach(function (c) {
                        c(done);
                    });
                }
            });
        </script>
        <?php
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function displayControl($column, FormControl $c)
    {
        $type = $c->getType();
        switch ($type) {
            case 'text':
                ?>
                <input
                    type="text"
                    name="<?php echo htmlspecialchars($column); ?>"
                    value="<?php echo htmlspecialchars($c->getValue()); ?>"
                >
                <?php
                break;
            case 'selectByRequest':
                $markers = [];
                $args = $c->getTypeArgs();
                $q = $args[0];
                $value = $c->getValue();
                if (array_key_exists(1, $args)) {
                    $markers = $args[1];
                }
                $items = QuickPdo::fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);

                ?>
                <select
                    name="<?php echo htmlspecialchars($column); ?>"
                >
                    <?php foreach ($items as $pk => $label):
                        $sel = ((int)$value === (int)$pk) ? ' selected="selected"' : '';
                        ?>
                        <option
                            <?php echo $sel; ?>value="<?php echo htmlspecialchars($pk); ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                break;
            case 'date3':
                $args = $c->getTypeArgs();

                if (array_key_exists(0, $args) && null !== $args[0]) {
                    $months = $args[0];
                } else {
                    $months = [
                        'january',
                        'february',
                        'march',
                        'april',
                        'may',
                        'june',
                        'july',
                        'august',
                        'september',
                        'october',
                        'november',
                        'december',
                    ];
                }
                $maxYear = (array_key_exists(1, $args)) ? $args[1] : date('Y');
                $minYear = (array_key_exists(2, $args)) ? $args[2] : 1900;
                if ($minYear > $maxYear) { // avoid infinite loop
                    $this->error("date3: max year cannot be less than min year");
                }

                $elId = 'date-3-' . $column;


                $value = $c->getValue();
                if (null !== $value) {
                    list($year, $month, $day) = explode('-', $value);
                } else {
                    $year = $month = $day = 0;
                }

                ?>
                <select class="autowidth _day" id="<?php echo $elId; ?>">
                    <?php for ($i = 1; $i <= 31; $i++):
                        $sel = ((int)$i === (int)$day) ? ' selected="selected"' : '';
                        $i = sprintf('%02s', $i);
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _month">
                    <?php for ($i = 0; $i < 12; $i++):
                        $sel = ((int)($i + 1) === (int)$month) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?>
                            value="<?php echo sprintf('%02s', $i + 1); ?>"><?php echo $months[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _year _lastdate">
                    <?php for ($i = $maxYear; $i >= $minYear; $i--):
                        $sel = ((int)$i === (int)$year) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <input class="_target" type="hidden" name="<?php echo htmlspecialchars($column); ?>" value="">
                <script>
                    (function () {
                        var dayEl = document.getElementById('<?php echo $elId; ?>');
                        window.onSubmitCallbacks.push(function (c) {
                            var parent = dayEl.parentNode;
                            var day = dayEl.options[dayEl.selectedIndex].value;
                            var monthEl = parent.querySelector('._month');
                            var month = monthEl.options[monthEl.selectedIndex].value;
                            var yearEl = parent.querySelector('._year');
                            var year = yearEl.options[yearEl.selectedIndex].value;

                            var date = year + '-' + month + '-' + day;
                            var target = parent.querySelector('._target');
                            target.value = date;
                            c();
                        })
                    })();
                </script>
                <?php
                break;
            case 'date6':
                $args = $c->getTypeArgs();

                if (array_key_exists(0, $args) && null !== $args[0]) {
                    $months = $args[0];
                } else {
                    $months = [
                        'january',
                        'february',
                        'march',
                        'april',
                        'may',
                        'june',
                        'july',
                        'august',
                        'september',
                        'october',
                        'november',
                        'december',
                    ];
                }
                $maxYear = (array_key_exists(1, $args)) ? $args[1] : date('Y');
                $minYear = (array_key_exists(2, $args)) ? $args[2] : 1900;
                if ($minYear > $maxYear) { // avoid infinite loop
                    $this->error("date6: max year cannot be less than min year");
                }

                $elId = 'date-6-' . $column;


                $value = $c->getValue();
                if (null !== $value) {
                    $p = explode(' ', $value);
                    list($year, $month, $day) = explode('-', $p[0]);
                    list($hour, $minute, $second) = explode(':', $p[1]);
                } else {
                    $year = $month = $day = $hour = $minute = $second = 0;
                }

                ?>
                <select class="autowidth _day" id="<?php echo $elId; ?>">
                    <?php for ($i = 1; $i <= 31; $i++):
                        $sel = ((int)$i === (int)$day) ? ' selected="selected"' : '';
                        $i = sprintf('%02s', $i);
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _month">
                    <?php for ($i = 0; $i < 12; $i++):
                        $sel = ((int)($i + 1) === (int)$month) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?>
                            value="<?php echo sprintf('%02s', $i + 1); ?>"><?php echo $months[$i]; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _year _lastdate">
                    <?php for ($i = $maxYear; $i >= $minYear; $i--):
                        $sel = ((int)$i === (int)$year) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>

                <select class="autowidth _hour">
                    <?php for ($i = 0; $i <= 23; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$hour) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>h</option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _minute">
                    <?php for ($i = 0; $i <= 59; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$minute) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>m</option>
                    <?php endfor; ?>
                </select>
                <select class="autowidth _second">
                    <?php for ($i = 0; $i <= 59; $i++):
                        $i = sprintf('%02s', $i);
                        $sel = ((int)$i === (int)$second) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $i; ?>"><?php echo $i; ?>s</option>
                    <?php endfor; ?>
                </select>

                <input class="_target" type="hidden" name="<?php echo htmlspecialchars($column); ?>" value="">
                <script>
                    (function () {
                        var dayEl = document.getElementById('<?php echo $elId; ?>');
                        window.onSubmitCallbacks.push(function (c) {
                            var parent = dayEl.parentNode;
                            var day = dayEl.options[dayEl.selectedIndex].value;
                            var monthEl = parent.querySelector('._month');
                            var month = monthEl.options[monthEl.selectedIndex].value;
                            var yearEl = parent.querySelector('._year');
                            var year = yearEl.options[yearEl.selectedIndex].value;
                            var hourEl = parent.querySelector('._hour');
                            var hour = hourEl.options[hourEl.selectedIndex].value;
                            var minuteEl = parent.querySelector('._minute');
                            var minute = minuteEl.options[minuteEl.selectedIndex].value;
                            var secondEl = parent.querySelector('._second');
                            var second = secondEl.options[secondEl.selectedIndex].value;

                            var date = year + '-' + month + '-' + day + " " + hour + ':' + minute + ':' + second;
                            var target = parent.querySelector('._target');
                            target.value = date;
                            c();
                        })
                    })();
                </script>
                <?php
                break;
            case 'message':
                ?>
                <textarea
                    name="<?php echo htmlspecialchars($column); ?>"
                ><?php echo $c->getValue(); ?></textarea>
                <?php
                break;
            default:
                $this->error("control type not handled: " . $type);
                break;
        }
    }


    private function error($m)
    {
        throw new \Exception($m);
    }


    private function getRicArray()
    {
        $ricValue = $_GET['ric'];
        $ricValueArr = explode($this->ricSeparator, $ricValue);
        return array_combine($this->ric, $ricValueArr);
    }

    private function label($name, FormControl $c)
    {
        $label = $c->getLabel();
        if (null !== $label) {
            return $label;
        }
        if (array_key_exists($name, $this->labels)) {
            return $this->labels[$name];
        }
        return $name;
    }
}