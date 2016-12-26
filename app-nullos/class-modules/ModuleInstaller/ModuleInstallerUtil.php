<?php


namespace ModuleInstaller;


use Bat\FileSystemTool;
use Installer\ModuleInstallerInterface;
use Installer\PackableModuleInstallerInterface;
use Installer\Report\Report;
use Installer\Saas\ModuleSaasInterface;
use ModuleInstaller\Exception\ReportException;
use ModuleInstaller\Saas\SaasInstaller;
use PublicException\PublicException;

class ModuleInstallerUtil
{


    public static function getTabUri($tab)
    {
        return ModuleInstallerConfig::getUri() . "?tab=" . $tab;
    }

    public static function getModuleDir($name)
    {
        return ModuleInstallerConfig::getModulesDir() . '/' . str_replace('.', '', $name);
    }

    public static function getModuleNames()
    {
        $ret = [];
        $dir = ModuleInstallerConfig::getModulesDir();
        $files = scandir($dir);
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                $file = $dir . '/' . $f;
                if (is_dir($file)) {
                    $ret[] = $f;
                }
            }
        }
        return $ret;
    }


    public static function getModulesList()
    {
        $ret = [];
        $dir = ModuleInstallerConfig::getModulesDir();
        $files = scandir($dir);
        $coreMods = ModuleInstallerConfig::getCoreModules();
        $states = ModuleInstallerPreferences::getPreferences();
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f) {
                $file = $dir . '/' . $f;
                if (is_dir($file)) {

                    $hasInstaller = 0;
                    $installerFile = $file . "/$f" . "Installer.php";
                    if (file_exists($installerFile)) {
                        $hasInstaller = 1;
                        $class = '\\' . $f . '\\' . $f . 'Installer';
                        $object = new $class;
                        if ($object instanceof PackableModuleInstallerInterface) {
                            $hasInstaller++;
                        }

                    }

                    $state = 'unknown'; // unknown|installed|uninstalled
                    if (array_key_exists($f, $states)) {
                        $state = $states[$f];
                    }
                    $isCore = (in_array($f, $coreMods, true)); // core modules cannot be deleted


                    $ret[$f] = [
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
        $report = new Report();
        call_user_func([$class, 'install'], $report);

        if ($class instanceof ModuleSaasInterface) {
            SaasInstaller::subscribe($class, $report);
        }
        self::throwReportIfNecessary($report);


        $states = ModuleInstallerPreferences::getPreferences();
        $states[$name] = 'installed';
        ModuleInstallerPreferences::setPreferences($states);
        return $report;
    }

    public static function uninstallModule($name)
    {
        $class = self::getModuleInstallerInstance($name, 'uninstall');
        $report = new Report();
        call_user_func([$class, 'uninstall'], $report);

        if ($class instanceof ModuleSaasInterface) {
            SaasInstaller::unsubscribe($class, $report);
        }
        self::throwReportIfNecessary($report);


        $states = ModuleInstallerPreferences::getPreferences();
        $states[$name] = 'uninstalled';
        ModuleInstallerPreferences::setPreferences($states);
    }

    public static function packModule($name)
    {
        $class = self::getModuleInstallerInstance($name, 'pack');
        if (method_exists($class, "pack")) {
            call_user_func([$class, 'pack']);
        }
    }

    public static function packAllModules()
    {
        $list = self::getModulesList();
        foreach ($list as $info) {
            if (2 === $info['installer']) {
                self::packModule($info['name']);
            }
        }
    }

    public static function removeModule($name)
    {
        $dir = self::getModuleDir($name);
        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {

            $states = ModuleInstallerPreferences::getPreferences();
            if ('installed' === $states[$name]) {
                self::uninstallModule($name);
            }
            unset($states[$name]);
            ModuleInstallerPreferences::setPreferences($states);


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
    private static function getModuleInstallerInstance($name, $method)
    {
        $dir = self::getModuleDir($name);
        if (true === FileSystemTool::existsUnder($dir, ModuleInstallerConfig::getModulesDir())) {
            $installerFile = $dir . "/$name" . "Installer.php";
            if (file_exists($installerFile)) {
                $class = '\\' . $name . '\\' . $name . 'Installer';
                $inst = new $class;
                if ($inst instanceof ModuleInstallerInterface) {

                    if ('pack' === $method) {
                        if (!$inst instanceof PackableModuleInstallerInterface) {
                            throw new \Exception("module installer for $name must implement PackableModuleInstallerInterface in order to call pack");
                        }
                    }

                    return $inst;
                } else {
                    throw new PublicException(__("Oops, module installer for {name} does not implement ModuleInstallerInterface", "modules/moduleInstaller/moduleInstaller", [
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

    private static function throwReportIfNecessary(Report $report)
    {
        if (true === $report->hasMessages()) {
            $e = new ReportException();
            $e->setReport($report);
            throw $e;
        }
    }

}