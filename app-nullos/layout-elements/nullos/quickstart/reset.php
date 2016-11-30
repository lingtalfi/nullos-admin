<?php

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
    <h3><?php echo __("Reset page", LL); ?></h3>

    <p>
        <?php echo __("Use this page to reset your <b>nullos admin</b> application.", LL); ?>
    </p>
    <p>
        <?php echo linkt("Need help?", doclink('official/modules/quickstart-module/reset-page.md'), true); ?>
    </p>
    <?php

    use QuickForm\QuickForm;
    use QuickStart\QuickStartModule;


    $form = QuickFormZ::create();


    $success = false;
    $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($form, &$success) {
        if (array_key_exists('options', $formattedValues) && is_array($formattedValues['options'])) {

            $options = $formattedValues['options'];

            $useInit = (in_array('init', $options, true));
            $useCrudConfig = (in_array('crudConfig', $options, true));
            $useCrudFiles = (in_array('crudFiles', $options, true));


            QuickStartModule::reset($useInit, $useCrudConfig, $useCrudFiles);
            $form->displayNothing = true;
            $success = true;
            return true;
        }
    };

    $form->title = __("Reset form", LL);
    $form->defaultValues = [
        'options' => [
            'init',
            'crudConfig',
            'crudFiles',
        ],
    ];

    $form->addControl('options')->type('checkboxList', [
        'init' => __('remove the init file', LL),
        'crudConfig' => __('empty the CrudConfig.php file', LL),
        'crudFiles' => __('remove all the auto-generated crud files', LL),
    ])->addConstraint('minChecked', 1);


    $form->messages['submit'] = __("Ok", LL);
    $form->play();


    if (true === $success):
        ?>
        <div class="alert alert-success">
            <?php echo __("The website has been successfully reset.", LL); ?><br>
            <?php echo __("{clickHere} to continue.", LL, ['clickHere' => linkt("Click here", QuickStartModule::getQuickStartUrl('action'))]); ?>
        </div>
        <?php

    endif;
    ?>

</div>