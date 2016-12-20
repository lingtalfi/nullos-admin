<?php


namespace NullosInfo;


class NullosInfoUtil
{


    //--------------------------------------------
    // Preferences
    //--------------------------------------------
    public static function getPreferences()
    {
        $ret = NullosInfoServices::getPreferencesStore()->retrieve();
        if (0 === count($ret)) {
            $ret = NullosInfoConfig::getDefaultPreferences();
        }
        return $ret;
    }


    public static function setPreferences(array $config)
    {
        $prefs = self::getPreferences();
        $newPrefs = array_replace_recursive($prefs, $config);
        NullosInfoServices::getPreferencesStore()->store($newPrefs);
    }


    public static function getTabUri($tab)
    {
        return NullosInfoConfig::getUri() . "?tab=" . $tab;
    }
}