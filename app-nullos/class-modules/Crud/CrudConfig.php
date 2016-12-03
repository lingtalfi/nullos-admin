<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;


    /**
     * Tables allowed by the crud.php script (which displays lists/forms)
     */
    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [

            ];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        return [

        ];
    }

    public static function getLeftMenuSectionsClasses()
    {
        return [

        ];
    }

    public static function getPrettyTableNames()
    {
        return [
        ];
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
        ];
    }

    public static function getPrettyColumnNames()
    {
        /**
         * If you want to be truly mutli language,
         * you need to translate the values as well,
         * but my client is french and she is the only one to use the admin,
         * so I didn't bother translating in other languages...
         */
        return [
        ];
    }

    public static function getListUrlTransformerIfCallback()
    {
        return function ($c) {
            return (false !== strpos($c, 'url_'));
        };
    }


    public static function getActionColumnsPosition()
    {
        return 'right';
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public static function getCrudUri()
    {
        return "/table";
    }

    public static function getCrudPage()
    {
        return 'modules/crud/crud.php';
    }

    public static function getCrudGeneratorsUri()
    {
        return "/crud-generators";
    }

    public static function getCrudGeneratorsPage()
    {
        return "modules/crud/crud-generators.php";
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


    //--------------------------------------------
    // CRUD GENERATORS PREFERENCES
    //--------------------------------------------
    public static function getCrudGeneratorsPreferencesDir()
    {
        return APP_ROOT_DIR . '/assets/modules/crud';
    }

    public static function getCrudGeneratorsPreferencesAutoFile()
    {
        return self::getCrudGeneratorsPreferencesDir() . '/auto-crud-generators-preferences.php';
    }

    public static function getCrudGeneratorsPreferencesUserFile()
    {
        return self::getCrudGeneratorsPreferencesDir() . '/crud-generators-preferences.php';
    }


}