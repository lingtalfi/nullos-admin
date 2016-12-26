<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use Linguist\LinguistConfig;
use Linguist\LinguistUtil;
use LogWatcher\LogWatcherUtil;
use ModuleInstaller\ModuleInstallerUtil;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;


LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');


define('LL', 'modules/logWatcher/logWatcher');
Spirit::set('ll', LL);


$tab = "logs";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['logs', 'help', 'config'])) {
        $tab = "logs";
    }
}


?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab(__("Logs", LL), LogWatcherUtil::getTabUri("logs"))->icon('find-page');
    $tabs->addRightTab(__("Help", LL), LogWatcherUtil::getTabUri("help"))->icon("help");
    $tabs->addRightTab(__("Config", LL), LogWatcherUtil::getTabUri("config"))->icon("settings");
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