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
    <h3><?php echo __("Customization", LL); ?></h3>
    <p>
        <?php echo __("In this section, customize the generators, then press the ok button below.", LL); ?>
    </p>
    <p>
        <?php echo __("If you don't know how to customize your generators, check out the {link}.", LL, ['link' => linkt("nullos documentation", wl2("nullos-doc-install-customize"))]); ?>
    </p>
    <?php

    use Crud\CrudModule;
    use QuickForm\QuickForm;


    $form = new QuickForm();

    $success = false;
    $form->formTreatmentFunc = function (array $formattedValues, &$msg) use ($form, &$success) {
        if (array_key_exists('doit', $formattedValues)) {
            CrudModule::triggerGenerators();
            $form->displayNothing = true;
            $success = true;
            return true;
        }
    };

    $form->addControl('doit')->type('hidden')->value('any')->label("");
    $form->messages['submit'] = 'Ok';
    $form->play();

    if (true === $success):
        ?>
        <div class="alert alert-success">
            <?php echo __("The crud generators have been successfully executed.", LL); ?>
        </div>
        <?php

    endif;
    ?>
</div>