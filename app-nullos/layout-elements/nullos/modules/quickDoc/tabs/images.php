<?php


use Layout\Goofy;
use QuickDoc\QuickDocUtil;
use QuickDoc\Util\Key2ValueListForm;


$type = "images";


$prefs = QuickDocUtil::getPreferences();

$mappings = QuickDocUtil::getMappings($type);

$defaultMode = $prefs[$type]['mode'];
$defaultAlpha = $prefs[$type]['alpha'];
$defaultGroup = $prefs[$type]['group'];


$form = Key2ValueListForm::create();
$form->onSubmit(function (array $foundList, array $unfoundList) use ($type) {
    $mappings = [
        "found" => $foundList,
        "unfound" => $unfoundList,
    ];
    if (true === QuickDocUtil::setMappings($type, $mappings)) {
        return Goofy::alertSuccess("The mappings have been successfully updated", true);
    } else {
        return Goofy::alertError("Couldn't write the mappings. Are your file permissions correct?", true);
    }
});


$form->onPreferencesChange(function (array $newPrefs) use ($type) {
    QuickDocUtil::setPreferences([
        $type => $newPrefs,
    ]);
});

$form
    ->mode($defaultMode)
    ->alpha($defaultAlpha)
    ->groupByFiles($defaultGroup)
    ->mappings($mappings)
    ->titles("Unresolved images", "Resolved images", "All images")
    ->display();
