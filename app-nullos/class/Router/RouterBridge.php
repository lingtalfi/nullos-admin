<?php


namespace Router;

use Boot\BootModule;
use Crud\CrudModule;
use FrontOne\FrontOneModule;
use IconsViewer\IconsViewerModule;
use Linguist\LinguistModule;
use NullosInfo\NullosInfoModule;
use QuickDoc\QuickDocModule;
use SqlTools\SqlToolsModule;

class RouterBridge
{
    /**
     * Owned by:
     * - router in www/index.php
     */
    public static function decorateUri2PagesMap(array &$uri2pagesMap)
    {
        BootModule::decorateUri2PagesMap($uri2pagesMap);
        SqlToolsModule::decorateUri2PagesMap($uri2pagesMap);
        CrudModule::decorateUri2PagesMap($uri2pagesMap);
        QuickDocModule::decorateUri2PagesMap($uri2pagesMap);
        IconsViewerModule::decorateUri2PagesMap($uri2pagesMap);
        LinguistModule::decorateUri2PagesMap($uri2pagesMap);
        NullosInfoModule::decorateUri2PagesMap($uri2pagesMap);
        FrontOneModule::decorateUri2PagesMap($uri2pagesMap);
    }

}