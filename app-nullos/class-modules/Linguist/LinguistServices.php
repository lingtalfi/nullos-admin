<?php


namespace Linguist;


use ArrayStore\ArrayStore;

class LinguistServices
{

    private static $prefsStore;



    /**
     * @return ArrayStore
     */
    public static function getPreferencesStore()
    {
        if (null === self::$prefsStore) {
            self::$prefsStore = ArrayStore::create()->path(LinguistConfig::getPreferencesFile());
        }
        return self::$prefsStore;
    }
}