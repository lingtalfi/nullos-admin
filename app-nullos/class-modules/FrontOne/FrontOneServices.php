<?php


namespace FrontOne;


use ArrayStore\ArrayStore;

class FrontOneServices
{

    private static $store;

    /**
     * @return ArrayStore
     */
    public static function getThemeStore()
    {
        if (null === self::$store) {
            self::$store = ArrayStore::create()->path(FrontOneConfig::getThemeFile());
        }
        return self::$store;
    }
}