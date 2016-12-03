<?php


use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use Boot\BootUtil;
use Crud\CrudConfig;
use Crud\CrudFormGenerator;
use Crud\CrudGenHelper;
use Crud\CrudListGenerator;
use Crud\CrudModule;
use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickStart\QuickStartModule;


$ll = 'modules/boot/boot';
Spirit::set('ll', $ll); // for linkt
define('LL', $ll); // translation context


?>
<div class="tac bignose install-page">
    <h3><?php echo __("Boot page", LL); ?></h3>
    <p>
        <?php echo __("Use this page to create {theInitLink}.", LL,
            ['theInitLink' => linkt("the init file", doclink('official/core-concepts/init-file.md'), true)]); ?>
    </p>
    <p>
        <?php echo linkt("Need help?", doclink('official/modules/boot-module/boot-page.md'), true); ?>
    </p>


    <?php

    ?>

    <div>
        <?php


        $form = QuickFormZ::create();


        $form->title = __("Boot form", LL);
        $form->header = Goofy::technicalNote(__("This will create/overwrite the {path} file.", LL, ['path' => '<span class="path">app-nullos/init.php</span>']), true);
        $form->labels = [
            'language' => __("language", LL),
            'websiteName' => __('website name', LL),
            'timezone' => __('time zone', LL),
            'dbName' => __('name', LL),
            'dbUser' => __('user', LL),
            'dbPass' => __('password', LL),
        ];
        $form->messages['submit'] = ucfirst(__("submit", LL));
        $langs = [];
        $form->addFieldset(__('Website information', LL), [
            'language',
            'websiteName',
            'timezone',
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

        $tzIdentifiers = [];
        $list = \DateTimeZone::listIdentifiers();
        foreach ($list as $v) {
            $tzIdentifiers[$v] = $v;
        }


        $form->addControl('language')->type('select', $langs)->addConstraint('required');
        $form->addControl('websiteName')->type('text', 'my website')->addConstraint('required');
        $form->addControl('timezone')->type('select', $tzIdentifiers)->value("Europe/Paris");
        $form->addControl('dbName')->type('text', 'my_db')->addConstraint('required');
        $form->addControl('dbUser')->type('text')->addConstraint('required');
        $form->addControl('dbPass')->type('text')->addConstraint('required');


        $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($langs, $form) {

            $lang = $formattedValues['language'];
            if (array_key_exists($lang, $langs)) {
                try {
                    $dbName = (string)$formattedValues['dbName'];
                    $dbUser = (string)$formattedValues['dbUser'];
                    $dbPass = (string)$formattedValues['dbPass'];
                    $websiteName = (string)$formattedValues['websiteName'];
                    $timeZone = (string)$formattedValues['timezone'];

                    QuickPdo::setConnection("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass, [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]);

                    if (true === BootUtil::generateInitTmp([
                            'lang' => $lang,
                            'websiteName' => $websiteName,
                            'timezone' => $timeZone,
                            'dbNameLocal' => $dbName,
                            'dbUserLocal' => $dbUser,
                            'dbPassLocal' => $dbPass,
                            'dbNameDistant' => $dbName,
                            'dbUserDistant' => $dbUser,
                            'dbPassDistant' => $dbPass,

                        ])
                    ) {
                        $msg = Goofy::alertSuccess(__("Congrats! The <b>init file</b> has been created", LL), true, true);
                        return true;
                    }

                } catch (\PDOException $e) {
                    $msg = __("The database information are incorrect, please try again", LL);
                    return false;
                } catch (\Exception $e) {
                    $msg = __("Oops, an error occurred, please check the logs.", LL);
                    Logger::log($e, 'boot.page');
                    return false;
                }

            }

            $msg = __("Oops, an error occurred", LL);
            return false;
        };


        $form->play();

        ?>
    </div>
</div>
