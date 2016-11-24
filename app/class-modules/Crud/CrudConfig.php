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


}