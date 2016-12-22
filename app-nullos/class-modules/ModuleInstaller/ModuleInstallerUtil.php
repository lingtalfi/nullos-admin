<?php


namespace ModuleInstaller;


use Bat\FileSystemTool;
use DirScanner\YorgDirScannerTool;
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
        $class = self::getModuleInstallerClass($name, 'install');
        call_user_func([$class, 'install']);
        $states = self::getStates();
        $states[$name] = 'installed';
        self::setStates($states);
    }

    public static function uninstallModule($name)
    {
        $class = self::getModuleInstallerClass($name, 'uninstall');
        call_user_func([$class, 'uninstall']);
        $states = self::getStates();
        $states[$name] = 'uninstalled';
        self::setStates($states);
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
    private static function getModuleInstallerClass($name, $method)
    {
        $dir = self::getModuleDir($name);
        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {
            $installerFile = $dir . "/$name" . "Installer.php";
            if (file_exists($installerFile)) {
                $class = '\\' . $name . '\\' . $name . 'Installer';
                if (method_exists($class, $method)) {
                    return $class;
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
}