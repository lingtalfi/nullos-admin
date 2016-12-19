<?php


use Bat\FileSystemTool;
use QuickDoc\QuickDocUtil;

$form = QuickFormZ::create();
$form->title = __("Configuration", LL);


$form->formTreatmentFunc = function (array $formattedValues, &$msg) {
    $srcDir = $formattedValues['srcDir'];
    $dstDir = $formattedValues['dstDir'];


    if (file_exists($srcDir)) {
        FileSystemTool::mkdir($dstDir, 0777, true);
        if (file_exists($dstDir)) {
            QuickDocUtil::setPreferences([
                'srcDir' => $srcDir,
                'dstDir' => $dstDir,
            ]);
            return true;
        } else {
            $msg = __("The destination directory must exist", LL);
            return false;
        }
    } else {
        $msg = __("The source directory must exist", LL);
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