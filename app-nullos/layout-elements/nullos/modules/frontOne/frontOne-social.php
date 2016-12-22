<?php


use FrontOne\FrontOneUtil;

$ll = 'modules/frontOne/frontOne';
Spirit::set('ll', $ll); // for linkt
define('LL', $ll); // translation context


?>
<div class="tac bignose install-page">
    <h3>Social links configuration</h3>
    <p>
        Use this page to configure your social links.
    </p>
    <p>
        <a href="#">Need help?</a>
    </p>
    <div>
        <?php


        $values = FrontOneUtil::getSocialLinks();

        $form = \QuickFormZ::create();

        $form->title = "Social links form";
        $form->labels = [
            'icon' => "Icon",
            // seo
            'seoTitle' => "Seo title",

            // texts
            'title' => "Title",
            'headerParagraph' => "Header paragraph",
            'footerParagraph' => "Footer paragraph",
        ];

        $form->defaultValues = [
            'facebook' => $values['facebook'],
            'github' => $values['github'],
            'instagram' => $values['instagram'],
            'twitter' => $values['twitter'],
        ];


        $form->addControl('facebook')->type('text');
        $form->addControl('github')->type('text');
        $form->addControl('instagram')->type('text');
        $form->addControl('twitter')->type('text');


        $form->formTreatmentFunc = function (array $formattedValues, &$msg) {
            FrontOneUtil::setSocialLinks($formattedValues);
            return true;
        };

        $form->play();

        ?>
    </div>
</div>
