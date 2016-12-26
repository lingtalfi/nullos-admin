<?php

namespace ModuleInstaller;


class ModuleInstallerConfig
{

    public static function getPage()
    {
        return "modules/moduleInstaller/moduleInstaller.php";
    }

    public static function getUri()
    {
        return "/module-installer";
    }

    public static function getModulesDir()
    {
        return APP_ROOT_DIR . "/class-modules";
    }

    public static function getCoreModules()
    {
        /**
         * A core module means that its functionality can be used by other modules.
         */
        return [
            'ApplicationLog',
            'Authentication',
            'Boot',
            'Crud',
            'Lang',
            'Layout',
            'LayoutDynamicHead',
            'ModuleInstaller',
            'Router',
            'ToolsLeftMenuSection',
        ];
    }

    public static function getStatesFile()
    {
        return APP_ROOT_DIR . "/assets/modules/moduleInstaller/states.php";
    }

    public static function getDefaultStates()
    {
        return [];
    }

}