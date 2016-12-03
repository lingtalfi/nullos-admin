<?php

use Crud\CrudModule;
use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickStart\QuickStartModule;


$ll = 'modules/quickstart/quickstart';
Spirit::set('ll', $ll);
define('LL', $ll);

?>
<div class="tac bignose install-page">
    <h3><?php echo __("Crud generators page", LL); ?></h3>
    <p>
        <?php echo __("Use this page to generate your crud generator preferences and/or your crud files.", LL); ?>
    </p>
    <p>
        <?php echo linkt("Need help?", doclink('official/modules/quickstart-module/crud-generators-page.md'), true); ?>
    </p>

    <div>
        <?php


        if (true === QuickPdo::hasConnection()) {


            $dbs = [];
            if (false !== ($rows = QuickPdo::fetchAll('show databases', [], \PDO::FETCH_COLUMN))) {
                foreach ($rows as $db) {
                    $dbs[$db] = $db;
                }
            }
            $form2 = QuickFormZ::create();
            $form2->messages['submit'] = ucfirst(__("submitCreateDatabase", LL));

            $form2->title = __("Generate forms and lists", LL);
            $form2->labels = [
                'database' => __("database", LL),
            ];

            $defaultOptions = [
                'files',
            ];
            if (array_key_exists('c', $_GET)) {
                $defaultOptions[] = 'prefs';
            }

            $form2->defaultValues = [
                'database' => QuickPdoInfoTool::getDatabase(),
                'options' => $defaultOptions,
            ];
            $customMessageIsSuccess = false;
            $form2->formTreatmentFunc = function (array $formattedValues, &$msg) use ($form2, &$formPosted, &$customMessageIsSuccess, $dbs) {
                $selectedDb = (string)$formattedValues['database'];
                if (array_key_exists($selectedDb, $dbs)) {
                    if (array_key_exists('options', $formattedValues) && is_array($formattedValues['options'])) {
                        $options = $formattedValues['options'];

                        $usePrefs = (in_array('prefs', $options, true));
                        $crudFiles = (in_array('files', $options, true));

                        $formPosted = true;
                        $form2->displayNothing = true;

                        try {
                            if (false !== CrudModule::triggerGenerators($selectedDb, $usePrefs, $crudFiles)) {
                                $customMessageIsSuccess = true;
                                return true;
                            }
                        } catch (\Exception $e) {
                            Logger::log($e, "crud.page.generators");
                            $customMessageIsSuccess = false;
                            return true;
                        }
                    }
                }
            };

            $form2->addControl('database')->type('select', $dbs)->addConstraint('required');
            $form2->addControl('options')->type('checkboxList', [
                'prefs' => __('create the crud generator preferences', LL),
                'files' => __('create the crud files', LL),
            ])->addConstraint('minChecked', 1);
            $form2->play();


            if (true === $formPosted) {

                if (true === $customMessageIsSuccess):
                    ?>
                    <div class="alert alert-success flexh">
                        <span class="icon-span"><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                        <span><?php echo __("Yes! All the tables have been regenerated, good job.", LL); ?><br>
                            <?php echo __("{clickHere} to refresh the page.", LL, ['clickHere' => linkt("Click here", QuickStartModule::getQuickStartUrl("crud-generators"))]); ?>
                        </span>
                    </div>
                <?php else: ?>
                    <div class="alert alert-error flexh">
                        <?php echo __("Oops, an error occurred, please check the logs.", LL); ?>
                    </div>
                    <?php
                endif;
            }

        } else {
            ?>
            <p>
                <?php echo __("Your application is currently not configured to work with a database.", LL); ?>
                <br>
                <?php echo __("You can configure your application using the {configurePage}", LL, ['configurePage' => linkt("Configure page", QuickStartModule::getQuickStartUrl('configure'))]); ?>
                <br>
                <?php echo __("(or click the \"Configure\" item on the left menu in the Quickstart section).", LL); ?>

            </p>
            <?php
        }


        ?>
    </div>
</div>