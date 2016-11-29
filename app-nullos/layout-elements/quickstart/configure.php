<?php


use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use Crud\CrudConfig;
use Crud\CrudFormGenerator;
use Crud\CrudGenHelper;
use Crud\CrudListGenerator;
use Crud\CrudModule;
use QuickForm\QuickForm;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;
use QuickStart\QuickStartModule;

if (!isset($isIncluded)) {
    $isIncluded = false;
}

$installInit = defined('I_AM_JUST_THE_FALLBACK_INIT');
define('LL', 'quickstart'); // translation context



function linkt($text, $href, $external = false)
{
    $target = '';
    if (true === $external) {
        $target = 'target="_blank"';
    }
    return '<a ' . $target . ' href="' . $href . '">' . __($text, LL) . '</a>';
}


if (false === $isIncluded): ?>
<div class="tac bignose install-page">
    <h3>Configuration page</h3>

    <?php endif; ?>
    <p>
        Use this page to configure the <b>nullos admin</b> application.
    </p>
    <p>
        <?php echo linkt("Need help?", doclink('official/modules/quickstart-module/configure-page.md'), true); ?>
    </p>


    <?php ob_start(); ?>
    <div class="technical-note icon-box">
        <div>
            <span><?php Icons::printIcon('build'); ?></span>
            <span class="text">This will create/overwrite the <span class="path">app-nullos/init.php</span> file.</span>
        </div>
    </div>
    <?php $note = ob_get_clean(); ?>

    <div>
        <?php


        $form = new QuickForm();


        $form->title = __("Configuration form", LL);
        $form->header = $note;
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
                <?php echo linkt("Ok", QuickStartModule::getQuickStartUrl('crud-generators', ['c' => 1])); ?>
            </section>
            <?php
        endif;
        ?>


    </div>
    <?php if (false === $isIncluded): ?>
</div>
<?php endif; ?>
