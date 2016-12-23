<?php


namespace ModuleInstaller;


use Bat\FileSystemTool;
use PublicException\PublicException;

class ModuleInstallerUtil
{


    public static function getTabUri($tab)
    {
        return ModuleInstallerConfig::getUri() . "?tab=" . $tab;
    }

    public static function getModuleDir($name)
    {
        return ModuleInstallerConfig::getModulesDir() . '/' . $name;
    }

    public static function getModulesList()
    {
        $ret = [];
        $dir = ModuleInstallerConfig::getModulesDir();
        $files = scandir($dir);
        $coreMods = ModuleInstallerConfig::getCoreModules();
        $states = self::getStates();
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                $file = $dir . '/' . $f;
                if (is_dir($file)) {

                    $hasInstaller = false;
                    $installerFile = $file . "/$f" . "Installer.php";
                    if (file_exists($installerFile)) {
                        $hasInstaller = true;
                    }

                    $state = 'unknown'; // unknown|installed|uninstalled
                    if (array_key_exists($f, $states)) {
                        $state = $states[$f];
                    }
                    $isCore = (in_array($f, $coreMods, true)); // core modules cannot be deleted


                    $ret[] = [
                        'name' => $f,
                        'state' => $state,
                        'installer' => (int)$hasInstaller,
                        'core' => (int)$isCore,
                    ];
                }
            }
        }
        return $ret;
    }

    public static function installModule($name)
    {
        $class = self::getModuleInstallerInstance($name, 'install');
        call_user_func([$class, 'install']);


        $states = self::getStates();
        $states[$name] = 'installed';
        self::setStates($states);
    }

    public static function uninstallModule($name)
    {
        $class = self::getModuleInstallerInstance($name, 'uninstall');
        call_user_func([$class, 'uninstall']);
        $states = self::getStates();
        $states[$name] = 'uninstalled';
        self::setStates($states);
    }

    public static function packModule($name)
    {
        $class = self::getModuleInstallerInstance($name, 'pack');
        call_user_func([$class, 'pack']);
    }

    public static function removeModule($name)
    {
        $dir = self::getModuleDir($name);
        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {

            $states = self::getStates();
            if ('installed' === $states[$name]) {
                self::uninstallModule($name);
            }
            unset($states[$name]);
            self::setStates($states);


            $list = self::getModulesList();
            foreach ($list as $item) {
                if ($name === $item['name']) {
                    if (0 === $item['core']) {
                        FileSystemTool::remove($dir);
                    } else {
                        throw new \Exception("A core module cannot be removed via the gui");
                    }
                }
            }
        }

    }
    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * states:
     * - installed
     * - uninstalled
     * - unknown
     */
    public static function getStates()
    {
        $ret = ModuleInstallerServices::getStatesStore()->retrieve();
        if (0 === count($ret)) {
            $ret = ModuleInstallerConfig::getDefaultStates();
        }
        return $ret;
    }


    public static function setStates(array $config)
    {
        $prefs = self::getStates();
        $newPrefs = array_replace_recursive($prefs, $config);
        ModuleInstallerServices::getStatesStore()->store($newPrefs);
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function getModuleInstallerInstance($name, $method)
    {
        $dir = self::getModuleDir($name);
        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {
            $installerFile = $dir . "/$name" . "Installer.php";
            if (file_exists($installerFile)) {
                $class = '\\' . $name . '\\' . $name . 'Installer';
                if (method_exists($class, $method)) {
                    return new $class;
                } else {
                    throw new PublicException(__("Oops, module installer for {name} does not contain a {method} method", "modules/moduleInstaller/moduleInstaller", [
                        'name' => $name,
                        'method' => $method,
                    ]));
                }
            } else {
                throw new PublicException(__("Oops, module installer not found", "modules/moduleInstaller/moduleInstaller"));
            }
        } else {
            throw new PublicException(__("Oops, module installer not found", "modules/moduleInstaller/moduleInstaller"));
        }
    }

//    private static function getModuleInstallerClass($name, $method)
//    {
//        $dir = self::getModuleDir($name);
//        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {
//            $installerFile = $dir . "/$name" . "Installer.php";
//            if (file_exists($installerFile)) {
//                $class = '\\' . $name . '\\' . $name . 'Installer';
//                if (method_exists($class, $method)) {
//                    return $class;
//                } else {
//                    throw new PublicException(__("Oops, module installer for {name} does not contain a {method} method", "modules/moduleInstaller/moduleInstaller", [
//                        'name' => $name,
//                        'method' => $method,
//                    ]));
//                }
//            } else {
//                throw new PublicException(__("Oops, module installer not found", "modules/moduleInstaller/moduleInstaller"));
//            }
//        } else {
//            throw new PublicException(__("Oops, module installer not found", "modules/moduleInstaller/moduleInstaller"));
//        }
//    }
}