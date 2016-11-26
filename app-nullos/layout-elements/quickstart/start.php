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


function listify(array $items, $n = 12)
{
    $i = 0;
    return array_map(function ($v) use ($n, &$i) {
        if (0 === $i++) {
            $s = '';
        } else {
            $s = str_repeat(' ', $n);
        }
        return $s . '"' . $v . '",';
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

?>
<div class="tac bignose install-page">
    <h3>Welcome to the <?php echo WEBSITE_NAME; ?> install page</h3>
    <?php if (true === $installInit): ?>
    <p>
        This page helps you configure your <b>nullos admin</b> website.<br>
        Please fill the form below.<br>
        For more details about the installation process, see the <a href="#">nullos documentation</a>.
    </p>

    <div>
        <?php


        $form = new QuickForm();


        $form->title = "Installation form";
        $form->labels = [
            'language' => "language",
            'dbName' => 'name',
            'dbUser' => 'user',
            'dbPass' => 'password',
        ];
        $langs = [];
        $form->addFieldset('Website information', [
            'language',
            'websiteName',
        ]);
        $form->addFieldset('Database information', [
            'dbName',
            'dbUser',
            'dbPass',
        ]);
        $form->defaultValues = [
            'websiteName' => 'My Website',
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

                $msg = "Nice";
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
                        $msg = "Nice";
                        $stepIsSuccess = true;
                        $form->displayNothing = true;
                        return true;
                    }

                } catch (\Exception $e) {
                    $ret = false;
                    $msg = "The database information are incorrect, please try again";
                }
                return $ret;

            }

            $msg = "Oops, an error occurred";
            return false;
        };


        $form->play();


        if (true === $stepIsSuccess):
            ?>
            <div class="alert alert-success flexh">
                <span><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                <span>Congrats! The <b>init file</b> has been created</span>
            </div>
            <section>
                <p>
                    You can stop there if you want.<br>
                    ... or would you like to continue and generate all the tables of your website (recommended)?
                </p>
                <a href="/quickstart?action=start">Yes</a>
            </section>
            <?php
        endif; ?>

        <?php
        else:
            ?>
            <section>
                <p>
                    This is the last step of the installation. It's optional, but recommended.<br>
                    Use the form below to create the tables forms and lists for your website.
                </p>
                <p>
                    For more details, please visit the <a href="#">nullos documentation</a>.
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

                $form2->title = "Generate forms and lists";
                $form2->header = "<p>
Please select the database that your application interacts with.<br>
<span class='warning-color'>Warning</span>, this will overwrite your configuration file<br>
 (in <span class='path'>app-nullos/class-modules/Crud/CrudConfig.php</span>).
                </p>
                ";
                $form2->labels = [
                    'database' => "database",
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


                    //{tables}
                    $fTables = listify($tables, 16);

                    //{leftMenuSections}
                    // creating a "Main" and "Others" sections, just to get started
                    $sections = [];
                    $c = count($tables);
                    if ($c > 1) {
                        $half = (int)floor($c / 2);
                        $sections['Main'] = array_slice($tables, 0, $half);
                        $sections['Others'] = array_slice($tables, $half);
                    } else {
                        $sections['Main'] = $tables;
                        $sections['Others'] = [];
                    }
                    $sSections = array_to_string($sections);


                    //{prettyTableNames}
                    $prettyTables = [];
                    foreach ($tables as $table) {
                        if (false !== strpos($table, '_')) {
                            $prettyTables[$table] = str_replace('_', ' ', $table);
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
                                $cols[$name] = str_replace('_', ' ', $name);
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
                        $gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
                        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
                        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
                        $gen->urlTransformerIf = CrudConfig::getListUrlTransformerIfCallback();
                        $gen->generateLists();


                        // generate forms files
                        $gen = new CrudFormGenerator();
                        $gen->db = $selectedDb;
                        $gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
                        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
                        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
                        $gen->generateForms();




                        ?>
                        <div class="alert alert-success flexh">
                            <span class="icon-span"><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                            <span>
                            Yes! All the tables have been regenerated, good job.<br>
                            Please <a href="/quickstart?action=start">refresh the page</a>.
                        </span>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="alert alert-error flexh">
                            An error occurred, sorry.
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