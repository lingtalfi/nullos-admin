<?php


namespace Linguist\Util;


use DirScanner\YorgDirScannerTool;
use Linguist\LinguistConfig;

class LinguistScanner
{


    public static function getLangNames()
    {
        $langDir = LinguistConfig::getLangDir();
        return YorgDirScannerTool::getDirs($langDir, false, true);
    }


    /**
     * An item is an array with the following entries:
     * - 0: file, relative path to the file containing the $defs
     * - 1: key (the identifier of the message)
     * - 2: value (the translated message)
     * - 3: isLikeRefLang, a boolean indicating whether or not the value is the same as the refLang's value
     *          - if the value (for some reasons), only exist in the dst dir, but not in the refLang dir,
     *                  then isLikeRefLang will be false, to point out differences between both directories
     *
     *
     *
     * It returns an array of file => items
     *
     */
    public static function getDefinitionItems($lang, $refLang = "en")
    {

        $ret = [];
        $langDir = LinguistConfig::getLangDir();

        $dir = $langDir . "/" . $lang;
        $refDir = $langDir . "/" . $refLang;


        if (file_exists($dir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($dir, "php", false, true, true);
            foreach ($files as $file) {
                $realFile = $dir . "/" . $file;
                $defs = [];
                require $realFile;
                $targetDefs = $defs;

                $realRefFile = $refDir . "/" . $file;
                $refDefs = [];
                if (file_exists($realRefFile)) {
                    $defs = [];
                    require $realRefFile;
                    $refDefs = $defs;
                }

                foreach ($targetDefs as $k => $v) {
                    $isLikeRef = false;
                    if (array_key_exists($k, $refDefs) && $v === $refDefs[$k]) {
                        $isLikeRef = true;
                    }
                    $ret[$file][] = [$file, $k, $v, $isLikeRef];
                }
            }
        }
        return $ret;
    }


}