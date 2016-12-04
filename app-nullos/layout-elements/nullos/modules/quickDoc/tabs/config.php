<?php


use QuickDoc\QuickDocUtil;

$form = QuickFormZ::create();
$form->title = "Configuration";


$form->formTreatmentFunc = function (array $formattedValues, &$msg) {
    $srcDir = $formattedValues['srcDir'];
    $dstDir = $formattedValues['dstDir'];


    if (file_exists($srcDir)) {
        if (file_exists($dstDir)) {
            QuickDocUtil::setPreferences([
                'srcDir' => $srcDir,
                'dstDir' => $dstDir,
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
];
$form->addControl("srcDir")->type('text')->addConstraint("required");
$form->addControl("dstDir")->type('text')->addConstraint("required");
$form->play();