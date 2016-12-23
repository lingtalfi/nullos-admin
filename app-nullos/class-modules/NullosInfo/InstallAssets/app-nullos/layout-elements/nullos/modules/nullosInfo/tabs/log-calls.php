<?php


use Layout\Body\GroupedItems\GroupedItemsLayout;
use NullosInfo\NullosInfoUtil;
use NullosInfo\Util\InfoScanner;


$groups = InfoScanner::getLogCalls();



$prefs = NullosInfoUtil::getPreferences();
$defaultAlpha = $prefs['logCalls']['alpha'];
$defaultGroup = $prefs['logCalls']['group'];


$layout = new GroupedItemsLayout();
$layout->onPreferencesChange(function (array $newPrefs) {
    NullosInfoUtil::setPreferences([
        'logCalls' => $newPrefs,
    ]);
});

$layout
    ->alpha($defaultAlpha)
    ->groupByFiles($defaultGroup)
    ->groups($groups)
    ->texts([
        'alpha' => __("alphabetical order", LL),
        'group' => __("grouped", LL),
        'all' => __("All items", LL),
    ])
    ->display();
