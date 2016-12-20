<?php

use Layout\Body\Tabby\TabbyTabs;
use Layout\Goofy;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use QuickDoc\QuickDocConfig;
use QuickDoc\QuickDocException;
use QuickDoc\QuickDocUtil;
use QuickDoc\Util\TodoUtil;

LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');

define('LL', 'modules/quickDoc/quickDoc');
Spirit::set('ll', LL);

$prefs = QuickDocUtil::getPreferences();


$tab = "links";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['links', 'images', 'todo', 'action', 'help', 'config'])) {
        $tab = "links";
    }
}

if (null === $prefs['srcDir']) {
    $tab = "config";
}

$nMissingLinks = QuickDocUtil::countUnfoundItemsByName("links");
$nMissingImages = QuickDocUtil::countUnfoundItemsByName("images");
$nTodos = TodoUtil::getCountTodos();


LayoutDynamicHeadModule::registerCssIf("/style/modules/quickDoc/quickDoc.css", QuickDocConfig::getUri());

?>
<div class="tabby quickdoc">
    <?php
    $tabs = TabbyTabs::create();
    $tabs->addLeftTab(__("Links", LL), QuickDocUtil::getTabUri("links"))->icon('link')->badge($nMissingLinks, 'error');
    $tabs->addLeftTab(__("Images", LL), QuickDocUtil::getTabUri("images"))->icon('image')->badge($nMissingImages, 'error');
    $tabs->addLeftTab(__("Todo", LL), QuickDocUtil::getTabUri("todo"))->icon('assignment')->badge($nTodos, 'error');
    $tabs->addLeftTab(__("Action", LL), QuickDocUtil::getTabUri("action"))->icon('play');
    $tabs->addRightTab(__("Help", LL), QuickDocUtil::getTabUri("help"))->icon("help");
    $tabs->addRightTab(__("Config", LL), QuickDocUtil::getTabUri("config"))->icon("settings");
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