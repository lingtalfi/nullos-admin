<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;

LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');


$prefs = QuickDocUtil::getPreferences();


$tab = "links";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['links', 'images', 'action', 'help', 'config'])) {
        $tab = "links";
    }
}

if (null === $prefs['srcDir']) {
    $tab = "config";
}


LayoutDynamicHeadModule::registerCssIf("/style/modules/quickDoc/quickDoc.css", QuickDocConfig::getUri());

?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab("Links", QuickDocUtil::getTabUri("links"))->icon('link');
    $tabs->addLeftTab("Images", QuickDocUtil::getTabUri("images"))->icon('image');
    $tabs->addLeftTab("Action", QuickDocUtil::getTabUri("action"))->icon('play');
    $tabs->addRightTab("Help", QuickDocUtil::getTabUri("help"))->icon("help");
    $tabs->addRightTab("Config", QuickDocUtil::getTabUri("config"))->icon("settings");
    $tabs->display();
    ?>

    <div class="body">
        <?php
        try {
            require_once __DIR__ . "/tabs/" . $tab . ".php";
        } catch (QuickDocException $e) {
            Goofy::alertError($e->getMessage());
        }
        ?>
    </div>
</div>