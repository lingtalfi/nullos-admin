<?php


namespace QuickDoc;


use ArrayExport\ArrayExport;
use ArrayStore\ArrayStore;
use Bat\FileSystemTool;
use DirTransformer\Scanner\Scanner;
use DirTransformer\Transformer\TrackingMapRegexTransformer;

class QuickDocUtil
{

    private static $noSrcDirErrMsg = "The source dir or destination dir is not set. Please update your configuration first.";


    //--------------------------------------------
    // Locations
    public static function getTabUri($tab)
    {
        return QuickDocConfig::getUri() . "?tab=" . $tab;
    }

    public static function getMappingsFile($name)
    {
        if (in_array($name, QuickDocConfig::getAllowedMappings(), true)) {
            return QuickDocConfig::getMappingsDir() . "/$name.php";
        }
        throw new \Exception("This mapping is not allowed: $name");
    }



    //--------------------------------------------
    // Preferences
    public static function getPreferences()
    {
        $ret = QuickDocServices::getPreferencesStore()->retrieve();
        if (0 === count($ret)) {
            $ret = QuickDocConfig::getDefaultPreferences();
        }
        return $ret;
    }


    public static function setPreferences(array $config)
    {
        $prefs = self::getPreferences();
        $newPrefs = array_replace_recursive($prefs, $config);
        QuickDocServices::getPreferencesStore()->store($newPrefs);
    }


    //--------------------------------------------
    // Mappings
    public static function getMappings($name)
    {
        $ret = self::getStoreByName($name)->retrieve();
        if (0 === count($ret)) {
            $ret = [
                'found' => [],
                'unfound' => [],
            ];
        }
        return $ret;
    }

    public static function setMappings($name, array $mappings)
    {
        return self::getStoreByName($name)->store($mappings);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public static function copyDoc()
    {
        return self::_copyDoc(false);
    }


    public static function scanDoc()
    {
        return self::_copyDoc(true);
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    private static function _copyDoc($dry)
    {
        $prefs = self::getPreferences();
        $srcDir = $prefs['srcDir'];
        $dstDir = $prefs['dstDir'];
        if (null === $srcDir || null === $dstDir) {
            throw new QuickDocException(__(self::$noSrcDirErrMsg, "modules/quickDoc/quickDoc"));
        }


        $linksTransformer = self::getTransformerByName("links");
        $imagesTransformer = self::getTransformerByName("images");

        $scanner = Scanner::create();
        if (true === $dry) {
            $scanner->dryRun();
        }

        $scanner->allowedExtensions(['md'])
            ->addTransformer($linksTransformer)
            ->addTransformer($imagesTransformer)
            ->copy($srcDir, $dstDir);


        /**
         * Todo: fix scanning empties the mappings...
         */
        // links
        $found = self::cleanFound($linksTransformer->getFoundList());
        $unfound = self::cleanUnfound($linksTransformer->getUnfoundList());
        $mappings = [
            'found' => $found,
            'unfound' => $unfound,
        ];
        self::setMappings("links", $mappings);


        // images
        $found = self::cleanFound($imagesTransformer->getFoundList());
        $unfound = self::cleanUnfound($imagesTransformer->getUnfoundList());
        $mappings = [
            'found' => $found,
            'unfound' => $unfound,
        ];
        self::setMappings("images", $mappings);


        return true;
    }


    private static function cleanFound(array $found)
    {
        $ret = [];
        foreach ($found as $file => $items) {
            foreach ($items as $item) {
                $ret[$file][] = [
                    $item[1],
                    $item[2],
                ];
            }
        }
        return $ret;
    }

    private static function cleanUnfound(array $found)
    {
        $ret = [];
        foreach ($found as $file => $items) {
            foreach ($items as $item) {
                $ret[$file][] = [
                    $item[1],
                ];
            }
        }
        return $ret;
    }


    /**
     * @returns ArrayStore
     */
    private static function getStoreByName($name)
    {
        $store = null;
        if ('links' === $name) {
            $store = QuickDocServices::getLinksStore();
        } elseif ('images' === $name) {
            $store = QuickDocServices::getImagesStore();
        } else {
            throw new \Exception("No store bound to the name $name");
        }
        return $store;
    }


    /**
     * @returns TrackingMapRegexTransformer
     */
    private static function getTransformerByName($name)
    {

        $prefs = self::getPreferences();
        $srcDir = $prefs['srcDir'];
        if (file_exists($srcDir)) {

            $srcDir = rtrim($srcDir, '/');
            $len = strlen($srcDir) + 1;


            $transformer = null;
            if ('links' === $name) {
                $transformer = TrackingMapRegexTransformer::create()
                    ->regex('/<-\s*(.*)\s*->/U')
                    ->map(self::getFoundMapByName($name))
                    ->fileFunc(function ($file) use ($srcDir, $len) {
                        if (0 === strpos($file, $srcDir)) {
                            $file = '/' . substr($file, $len);
                        }
                        return $file;
                    })
                    ->onFound(function ($match, $value) {
                        return '[' . $match . '](' . $value . ')';
                    });;
            } elseif ('images' === $name) {
                $transformer = TrackingMapRegexTransformer::create()
                    ->regex('/<!-\s*(.*)\s*->/U')
                    ->map(self::getFoundMapByName($name))
                    ->fileFunc(function ($file) use ($srcDir, $len) {
                        if (0 === strpos($file, $srcDir)) {
                            $file = '/' . substr($file, $len);
                        }
                        return $file;
                    })
                    ->onFound(function ($match, $value) {
                        return '![' . $match . '](' . $value . ')';
                    });
            } else {
                throw new \Exception("No store bound to the name $name");
            }
            return $transformer;
        }
        throw new \Exception("The srcDir does not exist");
    }

    private static function getFoundMapByName($name)
    {
        $mappings = self::getMappings($name);
        return $mappings['found'];
    }

}