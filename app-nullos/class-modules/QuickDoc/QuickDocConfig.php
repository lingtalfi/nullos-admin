<?php

namespace QuickDoc;


class QuickDocConfig
{

    public static function getPage()
    {
        return "modules/quickDoc/quickDoc.php";
    }

    public static function getUri()
    {
        return "/quickdoc";
    }

    public static function getPreferencesFile()
    {
        return APP_ROOT_DIR . "/assets/modules/quickDoc/prefs.php";
    }

    public static function getAllowedMappings()
    {
        return ['links', 'images'];
    }


    public static function getMappingsDir()
    {
        return APP_ROOT_DIR . "/assets/modules/quickDoc";
    }


    public static function getDefaultPreferences()
    {
        /**
         * mode:
         *      - unresolved: show unresolved only
         *      - resolved: show resolved only
         *      - all: show all
         *
         * alpha: alphabetic order (otherwise order as items are encountered)
         *
         * group: organize the items by file (otherwise one big category for all items)
         *
         */
        return [
            'srcDir' => null,
            'dstDir' => null,
            'links' => [
                'mode' => 'all',
                'alpha' => true,
                'group' => false,
            ],
            'images' => [
                'mode' => 'all',
                'alpha' => true,
                'group' => false,
            ],
        ];
    }

}