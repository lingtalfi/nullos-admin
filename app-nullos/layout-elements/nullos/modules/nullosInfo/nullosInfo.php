<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use NullosInfo\NullosInfoUtil;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;
use QuickDoc\Util\TodoUtil;

LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/grouped-items.css');

define('LL', 'modules/nullosInfo/nullosInfo');
Spirit::set('ll', LL);

$prefs = QuickDocUtil::getPreferences();


$tab = "log-calls";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['log-calls', 'privileges', 'help'])) {
        $tab = "log-calls";
    }
}


?>
<div class="tabby">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab(__("Log Calls", LL), NullosInfoUtil::getTabUri("log-calls"))->icon('trending-up');
    $tabs->addLeftTab(__("Privileges", LL), NullosInfoUtil::getTabUri("privileges"))->icon('lock');

    $tabs->addRightTab(__("Help", LL), NullosInfoUtil::getTabUri("help"))->icon("help");
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


