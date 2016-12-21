<?php


use FrontOne\FrontOneConfig;
use Layout\Body\SimpleForm\SimpleForm;
use Layout\Goofy;

$ll = 'modules/frontOne/frontOne';
Spirit::set('ll', $ll); // for linkt
define('LL', $ll); // translation context


?>
<div class="tac bignose install-page">
    <h3>Theme configuration</h3>
    <p>
        Use this page to configure your theme.
    </p>
    <p>
        <a href="#">Need help?</a>
    </p>
    <div>
        <?php


        $theme = FrontOneConfig::getDefaultTheme();

        $form = \QuickFormZ::create();

        $form->title = "Theme form";
        $form->labels = [
            'icon' => "Icon",
            // seo
            'seoTitle' => "Seo title",

            // texts
            'title' => "Title",
            'headerParagraph' => "Header paragraph",
            'footerParagraph' => "Footer paragraph",
        ];

        $form->addFieldset(__('Seo', LL), [
            'seoTitle',
        ]);
        $form->addFieldset(__('Theme texts', LL), [
            'title',
            'headerParagraph',
            'footerParagraph',
        ]);
        $form->defaultValues = [
            'seoTitle' => $theme['seoTitle'],
            'title' => $theme['seoTitle'],
            'headerParagraph' => $theme['headerParagraph'],
            'footerParagraph' => $theme['footerParagraph'],
            'icon' => $theme['icon'],
        ];


        $form->addControl('icon')->type('text')->hint("http://fontawesome.io/icons/");
        $form->addControl('seoTitle')->type('text');
        $form->addControl('title')->type('text');
        $form->addControl('headerParagraph')->type('message');
        $form->addControl('footerParagraph')->type('message');


        $form->formTreatmentFunc = function (array $formattedValues, &$msg) {
            return true;
        };

        $form->play();

        ?>
    </div>
</div>
