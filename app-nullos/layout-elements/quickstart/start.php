<?php


use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use Crud\CrudConfig;
use Crud\CrudFormGenerator;
use Crud\CrudGenHelper;
use Crud\CrudListGenerator;
use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickStart\QuickStartModule;

$installInit = defined('I_AM_JUST_THE_FALLBACK_INIT');
define('LL', 'quickstart'); // translation context

function listify(array $items, $n = 12)
{
    $i = 0;
    return array_map(function ($v) use ($n, &$i) {
        if (0 === $i++) {
            $s = '';
        } else {
            $s = str_repeat(' ', $n);
        }
        return $s . "'" . $v . "',";
    }, $items);
}

function array_to_string(array $items)
{
    $manager = new PhpArrayToStringSymbolManager();
    $manager->setIndentationCallback(function ($spaceSymbol, $nbSpaces, $level) {
        if (0 === $level) {
            return str_repeat($spaceSymbol, 8);
        }
        if (1 === $level) {
            return str_repeat($spaceSymbol, 12);
        }
        return str_repeat($spaceSymbol, 16);
    });

    return 'return ' . ArrayToStringUtil::create()->setSymbolManager($manager)->toString($items) . ";";
//    return substr($sSections, 1, -1);

}

function linkt($text, $href, $external = false)
{
    $target = '';
    if (true === $external) {
        $target = 'target="_blank"';
    }
    return '<a ' . $target . ' href="' . $href . '">' . __($text, LL) . '</a>';
}

?>
<div class="tac bignose install-page">
    <h3><?php echo __("Welcome to the {website} install page", LL, ['website' => WEBSITE_NAME]); ?></h3>
    <?php if (true === $installInit): ?>
    <p>
        <?php echo __("This page helps you configure your <b>nullos admin</b> website.", LL); ?><br>
        <?php echo __("Please fill the form below.", LL); ?><br>
        <?php echo __("For more details about the installation process, see the {link}.", LL, ['link' => linkt("nullos documentation", wl2('nullos-doc-install'), true)]); ?>
    </p>

    <div>
        <?php


        $form = new QuickForm();


        $form->title = __("Installation form", LL);
        $form->labels = [
            'language' => __("language", LL),
            'websiteName' => __('website name', LL),
            'dbName' => __('name', LL),
            'dbUser' => __('user', LL),
            'dbPass' => __('password', LL),
        ];
        $form->messages['submit'] = ucfirst(__("submit", LL));
        $langs = [];
        $form->addFieldset(__('Website information', LL), [
            'language',
            'websiteName',
        ]);
        $form->addFieldset(__('Database information', LL), [
            'dbName',
            'dbUser',
            'dbPass',
        ]);
        $form->defaultValues = [
            'websiteName' => __('My Website', LL),
            'dbUser' => 'root',
            'dbPass' => 'root',
        ];
        $entries = scandir(APP_ROOT_DIR . '/lang');
        foreach ($entries as $v) {
            if ('.' !== $v && '..' !== $v && is_dir(APP_ROOT_DIR . '/lang/' . $v)) {
                $langs[$v] = $v;
            }
        }

        $form->addControl('language')->type('select', $langs)->addConstraint('required');
        $form->addControl('websiteName')->type('text', 'my website')->addConstraint('required');
        $form->addControl('dbName')->type('text', 'my_db')->addConstraint('required');
        $form->addControl('dbUser')->type('text')->addConstraint('required');
        $form->addControl('dbPass')->type('text')->addConstraint('required');


        $stepIsSuccess = false;


        $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($langs, &$stepIsSuccess, $form) {

            $lang = $formattedValues['language'];
            if (array_key_exists($lang, $langs)) {

                $msg = __("Nice", LL);
                $ret = true;
                try {
                    $dbName = (string)$formattedValues['dbName'];
                    $dbUser = (string)$formattedValues['dbUser'];
                    $dbPass = (string)$formattedValues['dbPass'];
                    $websiteName = (string)$formattedValues['websiteName'];

                    QuickPdo::setConnection("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass, [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]);

                    if (true === QuickStartModule::generateInitTmp([
                            'lang' => $lang,
                            'websiteName' => $websiteName,
                            'dbNameLocal' => $dbName,
                            'dbUserLocal' => $dbUser,
                            'dbPassLocal' => $dbPass,
                            'dbNameDistant' => $dbName,
                            'dbUserDistant' => $dbUser,
                            'dbPassDistant' => $dbPass,

                        ])
                    ) {
                        $msg = __("Nice", LL);
                        $stepIsSuccess = true;
                        $form->displayNothing = true;
                        return true;
                    }

                } catch (\Exception $e) {
                    $ret = false;
                    $msg = __("The database information are incorrect, please try again", LL);
                }
                return $ret;

            }

            $msg = __("Oops, an error occurred", LL);
            return false;
        };


        $form->play();


        if (true === $stepIsSuccess):
            ?>
            <div class="alert alert-success flexh">
                <span><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                <span><?php echo __("Congrats! The <b>init file</b> has been created", LL); ?></span>
            </div>
            <section>
                <p>
                    <?php echo __("You can stop there if you want.", LL); ?><br>
                    <?php echo __("... or would you like to continue and generate all the tables of your website now (recommended)?", LL); ?>
                </p>
                <?php echo linkt("Yes", QuickStartModule::getQuickStartUrl('start')); ?>
            </section>
            <?php
        endif; ?>

        <?php
        else:
            ?>
            <section>
                <p>
                    <?php echo __("This is the last step of the installation. It's optional, but recommended.", LL); ?>
                    <br>
                    <?php echo __("Use the form below to create the tables forms and lists for your website.", LL); ?>
                </p>
                <p>
                    <?php echo __("For more details, please visit the {link}.", LL, ['link' => linkt("nullos documentation", wl2('nullos-doc-install'), true)]); ?>
                </p>
            </section>

            <div>
                <?php

                $dbs = [];
                if (false !== ($rows = QuickPdo::fetchAll('show databases', [], \PDO::FETCH_COLUMN))) {
                    foreach ($rows as $db) {
                        $dbs[$db] = $db;
                    }
                }
                $form2 = new QuickForm();
                $form2->messages['submit'] = ucfirst(__("submitCreateDatabase", LL));

                $form2->title = __("Generate forms and lists", LL);
                $form2->header = "<p>" . __("Please select the database that your application interacts with.", LL) . "<br>
                " . __("<span class='warning-color'>Warning</span>, this will overwrite your configuration file", LL) . "
<br>
 (" . __("in {path}", LL, ['path' => "<span class='path'>app-nullos/class-modules/Crud/CrudConfig.php</span>"]) . ").
                </p>
                ";
                $form2->labels = [
                    'database' => __("database", LL),
                ];
                $selectedDb = null;
                $form2->formTreatmentFunc = function (array $formattedValues, &$msg) use ($form2, &$selectedDb, $dbs) {
                    $selectedDb = (string)$formattedValues['database'];
                    if (array_key_exists($selectedDb, $dbs)) {
                        $form2->displayNothing = true;
                        return true;
                    }
                };

                $form2->addControl('database')->type('select', $dbs)->addConstraint('required');
                $form2->play();


                if (null !== $selectedDb) {

                    /**
                     * Todo maybe: ask the user if she wants multi-language generated CrudConfig (see comment in CrudConfig::getPrettyColumnNames)
                     */
                    $src = APP_ROOT_DIR . "/class-modules/QuickStart/template/CrudConfig-tmp.php";
                    $dst = APP_ROOT_DIR . "/class-modules/Crud/CrudConfig.php";

                    $tables = QuickPdoInfoTool::getTables($selectedDb);
                    $fullTables = array_map(function ($v) use ($selectedDb) {
                        return $selectedDb . '.' . $v;
                    }, $tables);


                    //{tables}
                    $fTables = listify($fullTables, 16);

                    //{leftMenuSections}
                    // creating a "Main" and "Others" sections, just to get started
                    $sections = [];
                    $c = count($fullTables);
                    if ($c > 1) {
                        $half = (int)floor($c / 2);
                        $sections[__('Main', LL)] = array_slice($fullTables, 0, $half);
                        $sections[__('Others', LL)] = array_slice($fullTables, $half);
                    } else {
                        $sections[__('Main', LL)] = $fullTables;
                        $sections[__('Others', LL)] = [];
                    }
                    $sSections = array_to_string($sections);


                    //{prettyTableNames}
                    $prettyTables = [];
                    foreach ($fullTables as $table) {
                        if (false !== strpos($table, '_')) {
                            $p = explode('.', $table, 2);
                            $ftable = array_pop($p);
                            $prettyTables[$table] = str_replace('_', ' ', $ftable);
                        }
                    }

                    //{foreignKeyPrettierColumns}
                    $foreignKeyPrettierColumns = CrudGenHelper::generateForeignKeyPrettierColumns();


                    //{getPrettyColumnNames}
                    $cols = [];
                    foreach ($tables as $table) {
                        $names = QuickPdoInfoTool::getColumnNames($table, $selectedDb);
                        foreach ($names as $name) {
                            if (false !== strpos($name, '_')) {
                                $cleanName = $name;
                                if ('_id' === substr($name, -3)) {
                                    $cleanName = substr($name, 0, -3);
                                }
                                $cols[$name] = str_replace('_', ' ', $cleanName);
                            }
                        }
                    }


                    // convert data to php array
                    $sPrettyTableNames = array_to_string($prettyTables);
                    $sForeign = array_to_string($foreignKeyPrettierColumns);
                    $sPrettyColNames = array_to_string($cols);


                    $tags = [
                        '//{tables}' => implode(PHP_EOL, $fTables),
                        '//{leftMenuSections}' => $sSections,
                        '//{prettyTableNames}' => $sPrettyTableNames,
                        '//{foreignKeyPrettierColumns}' => $sForeign,
                        '//{getPrettyColumnNames}' => $sPrettyColNames,
                    ];
                    $s = file_get_contents($src);
                    $s = str_replace(array_keys($tags), array_values($tags), $s);
                    $ret = file_put_contents($dst, $s);


                    if (false !== $ret):

                        // generate lists files
                        $gen = new CrudListGenerator();
                        $gen->db = $selectedDb;
                        $gen->foreignKeyPrettierColumns = $foreignKeyPrettierColumns;
                        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
                        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
                        $gen->urlTransformerIf = CrudConfig::getListUrlTransformerIfCallback();
                        $gen->generateLists();


                        // generate forms files
                        $gen = new CrudFormGenerator();
                        $gen->db = $selectedDb;
                        $gen->foreignKeyPrettierColumns = $foreignKeyPrettierColumns;
                        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
                        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
                        $gen->generateForms();


                        ?>
                        <div class="alert alert-success flexh">
                            <span class="icon-span"><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                            <span>
                            <?php echo __("Yes! All the tables have been regenerated, good job.", LL); ?><br>
                                <?php echo linkt("Click here", QuickStartModule::getQuickStartUrl('end', ['f' => 1])); ?>
                        </span>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="alert alert-error flexh">
                            <?php echo __("", LL); ?>
                        </div>
                        <?php
                    endif;
                }


                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>