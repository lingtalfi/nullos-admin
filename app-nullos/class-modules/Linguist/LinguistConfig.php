<?php


namespace Linguist;


class LinguistConfig
{

    public static function getLangDir()
    {
        return APP_ROOT_DIR . "/lang";
    }

    public static function getPage()
    {
        return "modules/linguist/linguist.php";
    }

    public static function getUri()
    {
        return "/linguist";
    }

    public static function getPreferencesFile()
    {
        return APP_ROOT_DIR . "/assets/modules/linguist/prefs.php";
    }

    public static function getDefaultPreferences()
    {
        return [
            'curLang' => "en",
            'refLang' => "en",
            'translateTab' => [
                'mode' => 'unmodified',
                'group' => false,
                'alpha' => true,
            ],
        ];
    }

}