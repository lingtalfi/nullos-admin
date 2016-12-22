<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use Linguist\LinguistConfig;
use Linguist\LinguistUtil;
use ModuleInstaller\ModuleInstallerUtil;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;


LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');


define('LL', 'modules/moduleInstaller/moduleInstaller');
Spirit::set('ll', LL);


$tab = "modules";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['modules', 'help'])) {
        $tab = "modules";
    }
}


//LayoutDynamicHeadModule::registerCssIf("/style/modules/linguist/linguist.css", LinguistConfig::getUri());



?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab(__("Modules", LL), ModuleInstallerUtil::getTabUri("modules"))->icon('widgets');
    $tabs->addRightTab(__("Help", LL), ModuleInstallerUtil::getTabUri("help"))->icon("help");
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