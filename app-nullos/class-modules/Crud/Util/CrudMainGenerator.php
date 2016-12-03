<?php


namespace Crud\Util;


use Crud\CrudConfig;

class CrudMainGenerator
{

    public static function generateCrudListsFromPreferences()
    {
        $finalPrefs = self::getPreferences();
        $gen = new CrudListGenerator();
        $gen->actionColumnsPosition = $finalPrefs['actionColumnsPosition'];
        $gen->prettyTableNames = $finalPrefs['prettyTableNames'];
        $gen->foreignKeyPrettierColumns = $finalPrefs['foreignKeyPrettierColumns'];
        $gen->fixPrettyColumnNames = $finalPrefs['prettyColumnNames'];
        $gen->urlTransformerIf = $finalPrefs['urlTransformerIf'];
        $gen->generateLists();

    }


    public static function generateCrudFormsFromPreferences()
    {

        $finalPrefs = self::getPreferences();
        $gen = new CrudFormGenerator();
        $gen->foreignKeyPrettierColumns = $finalPrefs['foreignKeyPrettierColumns'];
        $gen->prettyTableNames = $finalPrefs['prettyTableNames'];
        $gen->fixPrettyColumnNames = $finalPrefs['prettyColumnNames'];
        $gen->generateForms();
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getPreferences()
    {
        $prefs = [];
        require CrudConfig::getCrudGeneratorsPreferencesAutoFile();
        $autoPrefs = $prefs;
        $f = CrudConfig::getCrudGeneratorsPreferencesUserFile();
        $userPrefs = [];
        if (file_exists($f)) {
            require $f;
            $userPrefs = $prefs;
        }
        return array_replace($autoPrefs, $userPrefs);
    }
}