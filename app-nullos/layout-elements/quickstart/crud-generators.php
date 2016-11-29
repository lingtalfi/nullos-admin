<?php

use Crud\CrudModule;
use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickStart\QuickStartModule;

define('LL', 'quickstart');
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
    <h3>Crud generators page</h3>
    <p>
        Use this page to generate your crud generator preferences and/or your crud files.
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
            $form2 = new QuickForm();
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
                            Logger::log($e);
                            $customMessageIsSuccess = false;
                            return true;
                        }
                    }
                }
            };

            $form2->addControl('database')->type('select', $dbs)->addConstraint('required');
            $form2->addControl('options')->type('checkboxList', [
                'prefs' => 'create the crud generator preferences',
                'files' => 'create the crud files',
            ])->addConstraint('minChecked', 1);
            $form2->play();


            if (true === $formPosted) {

                if (true === $customMessageIsSuccess):
                    ?>
                    <div class="alert alert-success flexh">
                        <span class="icon-span"><?php echo Icons::printIcon('done', 'green', 48); ?></span>
                        <span><?php echo __("Yes! All the tables have been regenerated, good job.", LL); ?><br>
                            <a href="<?php echo QuickStartModule::getQuickStartUrl("crud-generators"); ?>">Click here</a> to refresh the page.
                        </span>
                    </div>
                <?php else: ?>
                    <div class="alert alert-error flexh">
                        Oops, an error occurred.
                    </div>
                    <?php
                endif;
            }

        } else {
            ?>
            <p>
                Your application currently is not configured to work with a database.<br>
                You can configure your application using the <a
                        href="<?php echo QuickStartModule::getQuickStartUrl('configure'); ?>">Configure page</a><br>
                (or click the "Configure" item on the left menu in the Quickstart section).

            </p>
            <?php
        }


        ?>
    </div>
</div>