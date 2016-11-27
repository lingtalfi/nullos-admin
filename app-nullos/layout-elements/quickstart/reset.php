<?php

define('LL', 'quickstart');
function linkt($text, $href, $external = false)
{
    $target = '';
    if (true === $external) {
        $target = 'target="_blank"';
    }
    return '<a ' . $target . ' href="' . htmlspecialchars($href) . '">' . __($text, LL) . '</a>';
}



?>
<div class="tac bignose install-page">
    <h3><?php echo __("Welcome to the Reset Utility", LL); ?></h3>

    <p>
        <span class="warning-color"><?php echo __("Warning!", LL); ?></span><br>
        <?php echo __("This is a tool for expert users only, don't use it if you don't know what you are doing.", LL); ?><br>
        <?php echo __("More information in the {link}.", LL, ['link' => linkt("nullos documentation", wl2('nullos-doc-quickstart-reset'))]); ?>
    </p>
    <p>
        <?php echo __("If you press the ok button below, it will do the following", LL); ?>
    </p>
    <ul class="centered-ul">
        <li><?php echo __("Remove your init file", LL); ?> (<span class="path">init.php</span>)</li>
        <li><?php echo __("Empty the configuration in CrudConfig", LL); ?> (<span class="path">class-modules/Crud/CrudConfig.php</span>)</li>
        <li>
            <?php echo __("Remove all the crud files in {path} and {path2}", LL, [
                'path' => '<span class="path">crud/auto-form</span>',
                'path2' => '<span class="path">crud/auto-list</span>',
            ]); ?>
        </li>
    </ul>


    <?php

    use QuickForm\QuickForm;
    use QuickStart\QuickStartModule;


    $form = new QuickForm();

    $success = false;
    $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($form, &$success) {
        if (array_key_exists('doit', $formattedValues)) {
            QuickStartModule::reset();
            $form->displayNothing = true;
            $success = true;
            return true;
        }
    };

    $form->addControl('doit')->type('hidden')->value('any')->label("");
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