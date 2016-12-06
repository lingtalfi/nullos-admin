<?php


namespace Linguist;


class LinguistUtil
{

    //--------------------------------------------
    // Locations
    public static function getTabUri($tab)
    {
        return LinguistConfig::getUri() . "?tab=" . $tab;
    }




    //--------------------------------------------
    // Preferences
    public static function getPreferences()
    {
        $ret = LinguistServices::getPreferencesStore()->retrieve();
        if (0 === count($ret)) {
            $ret = LinguistConfig::getDefaultPreferences();
        }
        return $ret;
    }


    public static function setPreferences(array $config)
    {
        $prefs = self::getPreferences();
        $newPrefs = array_replace_recursive($prefs, $config);
        LinguistServices::getPreferencesStore()->store($newPrefs);
    }
}