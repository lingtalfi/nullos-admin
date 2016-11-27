<?php


namespace Crud;

class CrudConfigCopy
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                'oui.configuration',
                'oui.concours',
                'oui.equipe',
                'oui.equipe_has_membres',
                'oui.membres',
                'oui.coups_de_coeur',
                'oui.videos',
                'oui.messages',
                'oui.users',
                'oui.users_has_styles_musicaux',
                'oui.styles_musicaux',
                'oui.pays',
                'oui.users_has_instruments',
                'oui.instruments',
                'oui.niveaux',
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


    public static function getPrettyTableNames()
    {
        return [
            'oui.equipe' => 'équipe',
            'oui.equipe_has_membres' => "membres des équipes",
            'oui.videos' => "vidéos",
            'oui.users_has_instruments' => "instruments des utilisateurs",
            'oui.users_has_styles_musicaux' => "styles musicaux des utilisateurs",
            'oui.styles_musicaux' => "styles musicaux",
            'oui.coups_de_coeur' => "coups de coeur",
            'oui.users' => "utilisateurs",
        ];
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
            'oui.equipe' => 'nom',
            'oui.membres' => 'pseudo',
            'oui.videos' => 'titre',
            'oui.users' => 'pseudo',
            'oui.concours' => 'titre',
            'oui.pays' => 'nom',
            'oui.instruments' => 'nom',
            'oui.niveaux' => 'nom',
            'oui.styles_musicaux' => 'nom',
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
            'cle' => 'clé',
            'equipe_id' => 'équipe',
            'url_photo' => 'url de la photo',
            'url_video' => 'url de la vidéo',
            'date_debut' => 'date début',
            'date_fin' => 'date fin',
            'reglement' => 'règlement',
            'membres_id' => 'membre',
            'videos_id' => 'vidéo',
            'users_id' => 'utilisateur',
            'concours_id' => 'concours',
            'nb_vues' => 'nb vues',
            'nb_likes' => 'nb likes',
            'date_creation' => 'date création',
            'password' => 'mot de passe',
            'date_naissance' => 'date naissance',
            'code_postal' => 'code postal',
            'pays_id' => 'pays',
            'niveaux_id' => 'niveau',
            'prochains_concerts' => 'prochains concerts',
            'sites_internet' => 'sites internet',
            // case where it should be different in form and list..., but it's just a helper, so you should tweak it manually, no big deal
            'show_sexe' => 'affichage sexe',
            'show_date_naissance' => 'affichage date de naissance',
            'show_niveau' => 'affichage niveau',
            'styles_musicaux_id' => 'style musical',
            'instruments_id' => 'instrument',
            'active' => 'actif',
        ];
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