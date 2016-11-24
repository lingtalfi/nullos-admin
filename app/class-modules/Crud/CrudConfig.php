<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                'configuration',
                'concours',
                'equipe',
                'equipe_has_membres',
                'membres',
                'coups_de_coeur',
                'videos',
                'messages',
                'users',
                'users_has_styles_musicaux',
                'styles_musicaux',
                'pays',
                'users_has_instruments',
                'instruments',
                'niveaux',
            ];
        }
        return self::$tables;
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