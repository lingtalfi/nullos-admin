<?php


namespace Router;

use Boot\BootModule;
use Crud\CrudModule;
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
    }

}