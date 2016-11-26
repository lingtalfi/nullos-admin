<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                "concours",
                "configuration",
                "coups_de_coeur",
                "equipe",
                "equipe_has_membres",
                "instruments",
                "membres",
                "messages",
                "niveaux",
                "pays",
                "styles_musicaux",
                "users",
                "users_has_instruments",
                "users_has_styles_musicaux",
                "videos",
            ];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        return [
            'Main' => [
                'concours',
                'configuration',
                'coups_de_coeur',
                'equipe',
                'equipe_has_membres',
                'instruments',
                'membres',
            ],
            'Others' => [
                'messages',
                'niveaux',
                'pays',
                'styles_musicaux',
                'users',
                'users_has_instruments',
                'users_has_styles_musicaux',
                'videos',
            ],
        ];
    }


    public static function getPrettyTableNames()
    {
        return [
            'coups_de_coeur' => 'coups de coeur',
            'equipe_has_membres' => 'equipe has membres',
            'styles_musicaux' => 'styles musicaux',
            'users_has_instruments' => 'users has instruments',
            'users_has_styles_musicaux' => 'users has styles musicaux',
        ];
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
            'equipe' => 'nom',
            'videos' => 'titre',
            'membres' => 'pseudo',
            'niveaux' => 'nom',
            'pays' => 'nom',
            'instruments' => 'nom',
            'users' => 'email',
            'styles_musicaux' => 'nom',
            'concours' => 'titre',
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
            'equipe_id' => 'equipe id',
            'url_photo' => 'url photo',
            'url_video' => 'url video',
            'date_debut' => 'date debut',
            'date_fin' => 'date fin',
            'videos_id' => 'videos id',
            'membres_id' => 'membres id',
            'date_creation' => 'date creation',
            'date_naissance' => 'date naissance',
            'code_postal' => 'code postal',
            'pays_id' => 'pays id',
            'niveaux_id' => 'niveaux id',
            'prochains_concerts' => 'prochains concerts',
            'sites_internet' => 'sites internet',
            'show_sexe' => 'show sexe',
            'show_date_naissance' => 'show date naissance',
            'show_niveau' => 'show niveau',
            'users_id' => 'users id',
            'instruments_id' => 'instruments id',
            'styles_musicaux_id' => 'styles musicaux id',
            'concours_id' => 'concours id',
            'nb_likes' => 'nb likes',
            'nb_vues' => 'nb vues',
        ];
    }

    public static function getListUrlTransformerIfCallback()
    {
        return function ($c) {
            return (false !== strpos($c, 'url_') || false !== strpos($c, '_url'));
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