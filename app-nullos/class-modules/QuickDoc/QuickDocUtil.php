<?php


namespace QuickDoc;


use ArrayExport\ArrayExport;
use Bat\FileSystemTool;

class QuickDocUtil
{


    public static function getPreferences()
    {
        $file = QuickDocConfig::getPreferencesFile();
        if (file_exists($file)) {
            $prefs = [];
            require $file;
        } else {
            $prefs = QuickDocConfig::getDefaultPreferences();
        }
        return $prefs;
    }


    public static function setPreferences(array $config)
    {

        $prefs = self::getPreferences();
        $newPrefs = array_replace_recursive($prefs, $config);

        $file = QuickDocConfig::getPreferencesFile();
        $content = '<?php' . PHP_EOL . PHP_EOL;
        $content .= '$prefs = ';
        $content .= ArrayExport::export($newPrefs);
        $content .= ';' . PHP_EOL;
        FileSystemTool::mkfile($file, $content);

    }

    public static function getTabUri($tab)
    {
        return QuickDocConfig::getUri() . "?tab=" . $tab;
    }


}