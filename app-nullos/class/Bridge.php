<?php


use Boot\BootModule;
use Crud\CrudModule;
use Lang\LangModule;
use LeftMenuSection\Tools\ToolsLeftMenuSectionModule;
use QuickStart\QuickStartModule;
use SqlTools\SqlToolsModule;

class Bridge
{


    private static $instances = [];


    //--------------------------------------------
    // APPLICATION SERVICES
    //--------------------------------------------
    /**
     * Owned by:
     * - router in www/index.php
     */
    public static function decorateUri2PagesMap(array &$uri2pagesMap)
    {
        BootModule::decorateUri2PagesMap($uri2pagesMap);
        QuickStartModule::decorateUri2PagesMap($uri2pagesMap);
        SqlToolsModule::decorateUri2PagesMap($uri2pagesMap);
        CrudModule::decorateUri2PagesMap($uri2pagesMap);
    }

    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayLeftMenuBlocks()
    {
        QuickStartModule::displayLeftMenuBlocks();
        ToolsLeftMenuSectionModule::displayLeftMenuBlocks();
        CrudModule::displayLeftMenuBlocks();
    }



    /**
     * Owned by:
     * - class-modules/LeftMenuSection/Tools/ToolsLeftMenuSectionModule
     */
    public static function displayToolsLeftMenuLinks()
    {
        BootModule::displayToolsLeftMenuLinks();
        CrudModule::displayToolsLeftMenuLinks();
        SqlToolsModule::displayToolsLeftMenuLinks();
    }



    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayTopBar()
    {
        LangModule::displayTopBar();
    }


    //--------------------------------------------
    // INSTANCES PREPARATION
    //--------------------------------------------
    private static function getBob()
    {
        return new Bob();
    }



    //--------------------------------------------
    // PRIVATE
    //--------------------------------------------
    private static function getInstance($name)
    {
        if (!array_key_exists($name, self::$instances)) {
            self::$instances[$name] = call_user_func('Bridge::get' . $name);
        }
        return self::$instances[$name];

    }


}