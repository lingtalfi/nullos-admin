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


define('LL', 'modules/linguist/linguist');
Spirit::set('ll', LL);


$tab = "translate";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['translate', 'tools', 'help', 'config'])) {
        $tab = "translate";
    }
}


LayoutDynamicHeadModule::registerCssIf("/style/modules/linguist/linguist.css", LinguistConfig::getUri());

if (false === file_exists(LinguistConfig::getPreferencesFile())) {
    $tab = "config";
}





?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab(__("Translate", LL), LinguistUtil::getTabUri("links"))->icon('translate');
    $tabs->addLeftTab(__("Tools", LL), LinguistUtil::getTabUri("tools"))->icon('build');
    $tabs->addRightTab(__("Help", LL), LinguistUtil::getTabUri("help"))->icon("help");
    $tabs->addRightTab(__("Config", LL), LinguistUtil::getTabUri("config"))->icon("settings");
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