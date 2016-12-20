<?php


namespace NullosInfo;


use ArrayStore\ArrayStore;

class NullosInfoServices
{

    private static $prefsStore;

    /**
     * @return ArrayStore
     */
    public static function getPreferencesStore()
    {
        if (null === self::$prefsStore) {
            self::$prefsStore = ArrayStore::create()->path(NullosInfoConfig::getPreferencesFile());
        }
        return self::$prefsStore;
    }
}