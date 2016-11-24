<?php


use Crud\CrudModule;

class Bridge
{


    private static $instances = [];



    //--------------------------------------------
    // APPLICATION SERVICES
    //--------------------------------------------
    public static function displayLeftMenuBlocks()
    {
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