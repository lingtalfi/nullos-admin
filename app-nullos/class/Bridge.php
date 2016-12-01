<?php


use Crud\CrudModule;
use Lang\LangModule;
use QuickStart\QuickStartModule;

class Bridge
{


    private static $instances = [];


    //--------------------------------------------
    // APPLICATION SERVICES
    //--------------------------------------------
    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayLeftMenuBlocks()
    {
        QuickStartModule::displayLeftMenuLinks();
        CrudModule::displayLeftMenuLinks();
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