<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use Linguist\LinguistConfig;
use Linguist\LinguistUtil;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;

LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');



$tab = "translate";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['translate', 'help', 'config'])) {
        $tab = "translate";
    }
}


LayoutDynamicHeadModule::registerCssIf("/style/modules/linguist/linguist.css", LinguistConfig::getUri());

if(false === file_exists(LinguistConfig::getPreferencesFile())){
    $tab = "config";
}





?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab("Translate", LinguistUtil::getTabUri("links"))->icon('translate');
    $tabs->addRightTab("Help", LinguistUtil::getTabUri("help"))->icon("help");
    $tabs->addRightTab("Config", LinguistUtil::getTabUri("config"))->icon("settings");
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