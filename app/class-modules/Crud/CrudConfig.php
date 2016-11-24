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


    public static function getPrettyTableNames()
    {
        return [
            'equipe' => 'équipe',
            'equipe_has_membres' => "membres des équipes",
            'videos' => "vidéos",
            'users_has_instruments' => "instruments des utilisateurs",
            'users_has_styles_musicaux' => "styles musicaux des utilisateurs",
            'styles_musicaux' => "styles musicaux",
            'coups_de_coeur' => "coups de coeur",
        ];
    }

    public static function getLeftMenuLinksSectionTitle()
    {
        return __('Website data', 'crud');
    }


    //--------------------------------------------
    // CRUD GEN
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
            'equipe' => 'nom',
            'membres' => 'pseudo',
            'videos' => 'titre',
            'users' => 'pseudo',
            'concours' => 'titre',
            'pays' => 'nom',
            'instruments' => 'nom',
            'niveaux' => 'nom',
            'styles_musicaux' => 'nom',
        ];
    }
    public static function getPrettyColumnNames()
    {
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