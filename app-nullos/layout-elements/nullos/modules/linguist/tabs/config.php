<?php


use Bat\FileSystemTool;
use Linguist\LinguistConfig;
use Linguist\LinguistUtil;
use Linguist\Util\LinguistScanner;
use QuickDoc\QuickDocUtil;

$form = QuickFormZ::create();
$form->title = "Configuration";


$form->formTreatmentFunc = function (array $formattedValues, &$msg) {
    $refLang = $formattedValues['refLang'];

    $langDir = LinguistConfig::getLangDir();

    $refLangDir = $langDir . "/" . $refLang;

    if (file_exists($refLangDir)) {
        LinguistUtil::setPreferences([
            'refLang' => $refLang,
        ]);
        return true;
    } else {
        $msg = "The reference lang directory must exist";
        return false;
    }
};


$prefs = LinguistUtil::getPreferences();
$form->defaultValues = [
    'refLang' => $prefs['refLang'],
];

$langNames = LinguistScanner::getLangNames();
$langs = [];
foreach ($langNames as $name) {
    $langs[$name] = $name;
}

$form->addControl("refLang")->type('select', $langs)->addConstraint("required");

$form->play();