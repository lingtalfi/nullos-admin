<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        return [];
    }


    public static function getPrettyTableNames()
    {
        return [];
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [];
    }

    public static function getPrettyColumnNames()
    {
        return [];
    }

    public static function getListUrlTransformerIfCallback()
    {
        return function ($c) {
            return (false !== strpos($c, 'url_'));
        };
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public static function getCrudRootUrl()
    {
        return "/table";
    }

    public static function getCrudDir()
    {
        return APP_ROOT_DIR . "/crud";
    }

    public static function getCrudGenListDir()
    {
        return self::getCrudDir() . '/auto-list';
    }

    public static function getCrudGenFormDir()
    {
        return self::getCrudDir() . '/auto-form';
    }


    public static function getCrudListDir()
    {
        return self::getCrudDir() . '/list';
    }


    public static function getCrudFormDir()
    {
        return self::getCrudDir() . '/form';
    }


}