<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                'oui.concours',
                'oui.configuration',
                'oui.coups_de_coeur',
                'oui.equipe',
                'oui.equipe_has_membres',
                'oui.instruments',
                'oui.membres',
                'oui.messages',
                'oui.niveaux',
                'oui.pays',
                'oui.styles_musicaux',
                'oui.users',
                'oui.users_has_instruments',
                'oui.users_has_styles_musicaux',
                'oui.videos',
            ];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        return [
            "Configuration" => [
                'oui.configuration',
            ],
            "Modération" => [
                'oui.concours',
                'oui.coups_de_coeur',
                'oui.videos',
            ],
            'Equipe' => [
                'oui.equipe',
                'oui.equipe_has_membres',
                'oui.membres',
            ],
            'Utilisateurs' => [
                'oui.users',
                'oui.users_has_styles_musicaux',
                'oui.users_has_instruments',
            ],
            'Données statiques' => [
                'oui.instruments',
                'oui.niveaux',
                'oui.pays',
                'oui.styles_musicaux',
            ],
            'Messages' => [
                'oui.messages',
            ],
        ];
    }

    public static function getLeftMenuSectionsClasses()
    {
        return [];
    }


    public static function getPrettyTableNames()
    {
        return [
            'oui.coups_de_coeur' => 'coups de coeur',
            'oui.equipe_has_membres' => 'equipe has membres',
            'oui.styles_musicaux' => 'styles musicaux',
            'oui.users_has_instruments' => 'users has instruments',
            'oui.users_has_styles_musicaux' => 'users has styles musicaux',
        ];
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
            'oui.equipe' => 'nom',
            'oui.videos' => 'titre',
            'oui.membres' => 'pseudo',
            'oui.niveaux' => 'nom',
            'oui.pays' => 'nom',
            'oui.instruments' => 'nom',
            'oui.users' => 'email',
            'oui.styles_musicaux' => 'nom',
            'oui.concours' => 'titre',
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
            'equipe_id' => 'equipe',
            'url_photo' => 'url photo',
            'url_video' => 'url video',
            'date_debut' => 'date debut',
            'date_fin' => 'date fin',
            'videos_id' => 'videos',
            'membres_id' => 'membres',
            'date_creation' => 'date creation',
            'date_naissance' => 'date naissance',
            'code_postal' => 'code postal',
            'pays_id' => 'pays',
            'niveaux_id' => 'niveaux',
            'prochains_concerts' => 'prochains concerts',
            'sites_internet' => 'sites internet',
            'show_sexe' => 'show sexe',
            'show_date_naissance' => 'show date naissance',
            'show_niveau' => 'show niveau',
            'users_id' => 'users',
            'instruments_id' => 'instruments',
            'styles_musicaux_id' => 'styles musicaux',
            'concours_id' => 'concours',
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