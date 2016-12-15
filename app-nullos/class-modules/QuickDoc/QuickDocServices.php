<?php


namespace QuickDoc;


use ArrayStore\ArrayStore;

class QuickDocServices
{

    private static $prefsStore;
    private static $linksStore;
    private static $imagesStore;



    /**
     * @return ArrayStore
     */
    public static function getPreferencesStore()
    {
        if (null === self::$prefsStore) {
            self::$prefsStore = ArrayStore::create()->path(QuickDocConfig::getPreferencesFile());
        }
        return self::$prefsStore;
    }


    /**
     * @return ArrayStore
     */
    public static function getLinksStore()
    {
        if (null === self::$linksStore) {
            self::$linksStore = ArrayStore::create()->path(QuickDocUtil::getMappingsFile('links'));
        }
        return self::$linksStore;
    }


    /**
     * @return ArrayStore
     */
    public static function getImagesStore()
    {
        if (null === self::$imagesStore) {
            self::$imagesStore = ArrayStore::create()->path(QuickDocUtil::getMappingsFile('images'));
        }
        return self::$imagesStore;
    }


}