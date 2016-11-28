<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                //{tables}
            ];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        //{leftMenuSections}
    }

    public static function getLeftMenuSectionsClasses()
    {
        return [];
    }


    public static function getPrettyTableNames()
    {
        //{prettyTableNames}
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        //{foreignKeyPrettierColumns}
    }

    public static function getPrettyColumnNames()
    {
        /**
         * If you want to be truly mutli language,
         * you need to translate the values as well,
         * but my client is french and she is the only one to use the admin,
         * so I didn't bother translating in other languages...
         */
        //{getPrettyColumnNames}
    }

    public static function getListUrlTransformerIfCallback()
    {
        return function ($c) {
            return (false !== strpos($c, 'url_') || false !== strpos($c, '_url'));
        };
    }


    public static function getActionColumnsPosition()
    {
        return 'right';
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