<?php


namespace NullosInfo;


class NullosInfoConfig
{

    public static function getPage()
    {
        return "modules/nullosInfo/nullosInfo.php";
    }

    public static function getUri()
    {
        return "/nullos-info";
    }

    public static function getPreferencesFile()
    {
        return APP_ROOT_DIR . "/assets/modules/nullosInfo/prefs.php";
    }


    public static function getDefaultPreferences()
    {
        /**
         * alpha: alphabetic order (otherwise order as items are encountered)
         * group: organize the items by file (otherwise one big category for all items)
         */
        return [
            'logCalls' => [
                'alpha' => true,
                'group' => true,
            ],
            'privileges' => [
                'alpha' => true,
                'group' => true,
            ],
        ];
    }
}