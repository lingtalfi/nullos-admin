<?php


use QuickDoc\QuickDocUtil;

$form = QuickFormZ::create();
$form->title = "Configuration";


$form->formTreatmentFunc = function (array $formattedValues, &$msg) {
    $srcDir = $formattedValues['srcDir'];
    $dstDir = $formattedValues['dstDir'];

    $linkMode = $formattedValues['link_mode'];
    $linkAlpha = (bool)$formattedValues['link_alpha'];
    $linkGroup = (bool)$formattedValues['link_group'];

    $imageMode = $formattedValues['image_mode'];
    $imageAlpha = (bool)$formattedValues['image_alpha'];
    $imageGroup = (bool)$formattedValues['image_group'];


    if (file_exists($srcDir)) {
        if (file_exists($dstDir)) {
            QuickDocUtil::setPreferences([
                'srcDir' => $srcDir,
                'dstDir' => $dstDir,
                'links' => [
                    'mode' => $linkMode,
                    'alpha' => $linkAlpha,
                    'group' => $linkGroup,
                ],
                'images' => [
                    'mode' => $imageMode,
                    'alpha' => $imageAlpha,
                    'group' => $imageGroup,
                ],
            ]);
            return true;
        } else {
            $msg = "The destination directory must exist";
            return false;
        }
    } else {
        $msg = "The source directory must exist";
        return false;
    }

};


$prefs = QuickDocUtil::getPreferences();


$form->defaultValues = [
    'srcDir' => $prefs['srcDir'],
    'dstDir' => $prefs['dstDir'],
    'link_mode' => $prefs['links']['mode'],
    'link_alpha' => $prefs['links']['alpha'],
    'link_group' => $prefs['links']['group'],
    'image_mode' => $prefs['images']['mode'],
    'image_alpha' => $prefs['images']['alpha'],
    'image_group' => $prefs['images']['group'],
];

$modeOptions = [
    'all' => "show all",
    'unresolved' => "show unresolved only",
    'resolved' => "show resolved only",
];


$form->addFieldset("Default Links Preferences", [
    'link_mode',
    'link_alpha',
    'link_group',
]);

$form->addFieldset("Default Images Preferences", [
    'image_mode',
    'image_alpha',
    'image_group',
]);

$form->addControl("srcDir")->type('text')->addConstraint("required");
$form->addControl("dstDir")->type('text')->addConstraint("required");
$form->addControl("link_mode")->type('select', $modeOptions);
$form->addControl("link_alpha")->type('checkbox', "Sort alphabetically");
$form->addControl("link_group")->type('checkbox', "Grouped by files");


$form->addControl("image_mode")->type('select', $modeOptions);
$form->addControl("image_alpha")->type('checkbox', "Sort alphabetically");
$form->addControl("image_group")->type('checkbox', "Grouped by files");

$form->play();