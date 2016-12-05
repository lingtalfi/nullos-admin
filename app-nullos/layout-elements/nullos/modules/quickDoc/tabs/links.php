<?php


use Layout\Goofy;
use QuickDoc\QuickDocUtil;
use QuickDoc\Util\Key2ValueListForm;


$type = "links";


$prefs = QuickDocUtil::getPreferences();

$mappings = QuickDocUtil::getMappings($type);

$defaultMode = $prefs[$type]['mode'];
$defaultAlpha = $prefs[$type]['alpha'];
$defaultGroup = $prefs[$type]['group'];


$form = Key2ValueListForm::create();
$form->handlePost(function (array $foundList, array $unfoundList) use ($type) {
    $mappings = [
        "found" => $foundList,
        "unfound" => $unfoundList,
    ];
    if (true === QuickDocUtil::setMappings($type, $mappings)) {
        return Goofy::alertSuccess("The definitions of the dictionary have been successfully updated", true);
    } else {
        return Goofy::alertError("Couldn't write the definitions in the dictionary. Are your file permissions correct?", true);
    }
});


$form
    ->mode($defaultMode)
    ->alpha($defaultAlpha)
    ->groupByFiles($defaultGroup)
    ->mappings($mappings)
    ->titles("Unresolved links", "Resolved links", "All links")
    ->display();
