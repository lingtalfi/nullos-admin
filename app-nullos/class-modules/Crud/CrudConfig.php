<?php


namespace Crud;

class CrudConfig
{

    private static $tables = null;

    public static function getTables()
    {
        if (null === self::$tables) {
            self::$tables = [
                'ville.villes_france_free',
            ];
        }
        return self::$tables;
    }

    public static function getLeftMenuSections()
    {
        return [
            'Principal' => [
                'ville.villes_france_free',
            ],
            'Autres' => [
            ],
        ];
    }


    public static function getPrettyTableNames()
    {
        return [
            'ville.villes_france_free' => 'villes france free',
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
            'ville_id' => 'ville',
            'ville_departement' => 'ville departement',
            'ville_slug' => 'ville slug',
            'ville_nom' => 'ville nom',
            'ville_nom_simple' => 'ville nom simple',
            'ville_nom_reel' => 'ville nom reel',
            'ville_nom_soundex' => 'ville nom soundex',
            'ville_nom_metaphone' => 'ville nom metaphone',
            'ville_code_postal' => 'ville code postal',
            'ville_commune' => 'ville commune',
            'ville_code_commune' => 'ville code commune',
            'ville_arrondissement' => 'ville arrondissement',
            'ville_canton' => 'ville canton',
            'ville_amdi' => 'ville amdi',
            'ville_population_2010' => 'ville population 2010',
            'ville_population_1999' => 'ville population 1999',
            'ville_population_2012' => 'ville population 2012',
            'ville_densite_2010' => 'ville densite 2010',
            'ville_surface' => 'ville surface',
            'ville_longitude_deg' => 'ville longitude deg',
            'ville_latitude_deg' => 'ville latitude deg',
            'ville_longitude_grd' => 'ville longitude grd',
            'ville_latitude_grd' => 'ville latitude grd',
            'ville_longitude_dms' => 'ville longitude dms',
            'ville_latitude_dms' => 'ville latitude dms',
            'ville_zmin' => 'ville zmin',
            'ville_zmax' => 'ville zmax',
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