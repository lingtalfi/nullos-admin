<?php


use Crud\CrudModule;
use Privilege\Privilege;
use Privilege\PrivilegeUser;
use QuickStart\QuickStartModule;

class Bridge
{


    private static $instances = [];


    //--------------------------------------------
    // APPLICATION SERVICES
    //--------------------------------------------
    public static function displayLeftMenuBlocks()
    {
        QuickStartModule::displayLeftMenuLinks();
        CrudModule::displayLeftMenuLinks();
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