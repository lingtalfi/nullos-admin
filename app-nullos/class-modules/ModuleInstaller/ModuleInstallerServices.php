<?php


namespace ModuleInstaller;


use ArrayStore\ArrayStore;

class ModuleInstallerServices
{

    private static $states;


    /**
     * @return ArrayStore
     */
    public static function getStatesStore()
    {
        if (null === self::$states) {
            self::$states = ArrayStore::create()->path(ModuleInstallerConfig::getStatesFile());
        }
        return self::$states;
    }
}