<?php


use Layout\Goofy;
use QuickDoc\QuickDocUtil;
use QuickDoc\Util\Key2ValueListForm;


$form = Key2ValueListForm::create("images");
$form->handlePost(function (array $foundList, array $unfoundList) {

    if (QuickDocUtil::saveLinksDefinitions($foundList, $unfoundList)) {
        return Goofy::alertSuccess("The definitions of the dictionary have been successfully updated", true);
    } else {
        return Goofy::alertError("Couldn't write the definitions in the dictionary. Are your file permissions correct?", true);
    }
});


$form->titles("Unresolved images", "Resolved images", "All images")
    ->display();
