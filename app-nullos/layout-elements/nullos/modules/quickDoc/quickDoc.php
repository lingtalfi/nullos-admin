<?php

use Layout\Body\Tabby\TabbyTabs;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use QuickDoc\QuickDocUtil;

LayoutDynamicHeadModule::registerCss('/style/tabby.css');
LayoutDynamicHeadModule::registerCss('/style/key2value-form.css');


$prefs = QuickDocUtil::getPreferences();


$tab = "links";
if (array_key_exists("tab", $_GET)) {
    $tab = $_GET['tab'];
    if (false === in_array($tab, ['links', 'images', 'config'])) {
        $tab = "links";
    }
}

if (null === $prefs['srcDir']) {
    $tab = "config";
}


?>
    <div class="tabby">
        <?php
        $tabs = TabbyTabs::create();
        $tabs->addLeftTab("Links", QuickDocUtil::getTabUri("links"))->icon('link');
        $tabs->addLeftTab("Images", QuickDocUtil::getTabUri("images"))->icon('image');
        $tabs->addRightTab("Config", QuickDocUtil::getTabUri("config"))->icon("settings");
        $tabs->display();
        ?>

        <div class="body">
            <div class="body-top">
                <div class="box">
                    <select>
                        <option value="0">Show unresolved only</option>
                        <option value="1">Show resolved only</option>
                        <option value="2">Show all</option>
                    </select>
                </div>
                <div class="box">
                    <label>
                        <input type="checkbox"> alphabetical order
                    </label>
                </div>
                <div class="box">
                    <label>
                        <input type="checkbox"> grouped by files
                    </label>
                </div>
            </div>
            <div class="body-content">
                <?php require_once __DIR__ . "/tabs/" . $tab . ".php"; ?>
            </div>
        </div>
    </div>
<?php