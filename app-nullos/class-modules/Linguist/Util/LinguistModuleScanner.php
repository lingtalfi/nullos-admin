<?php


namespace Linguist\Util;



use ModuleInstaller\ModuleInstallerUtil;

class LinguistModuleScanner
{


    public static function getTranslationsByModule($moduleName, $tmpDir)
    {
        $ret = [];
        if (is_dir($tmpDir)) {
            $modDir = ModuleInstallerUtil::getModuleDir($moduleName);
            if (is_dir($modDir)) {

                //------------------------------------------------------------------------------/
                // MODULE
                //------------------------------------------------------------------------------/
                $mods = [];
                $files = scandir($modDir);
                foreach ($files as $f) {
                    if ('.' !== $f && '..' !== $f) {
                        $file = $modDir . "/" . $f;
                        $trans = [];
                        if (is_file($file)) {
                            $trans = LinguistScanner::scanTranslationsByFile($file);
                        } elseif (is_dir($file)) {
                            $trans = LinguistScanner::scanTranslationsByDir($file);
                        }
                        foreach ($trans as $info) {
                            $mods[] = $info['id'];
                        }
                    }
                }

                //------------------------------------------------------------------------------/
                // DEPLOYED ASSETS
                //------------------------------------------------------------------------------/
                $assetsDir = $modDir . "/InstallAssets";
                $nullosDir = null;
                if (file_exists("$assetsDir/app-nullos")) {
                    $nullosDir = "$assetsDir/app-nullos";
                } elseif (file_exists("$assetsDir/project/app-nullos")) {
                    $nullosDir = "$assetsDir/project/app-nullos";
                }
                if (null !== $nullosDir) {
                    $trans = LinguistScanner::scanTranslationsByDir($nullosDir);
                    /**
                     * Note: at first I intended to differentiate between pages translations,
                     * layout-elements translations and so on...
                     * but now I'm thinking that all translations in one file is better.
                     * I might change my mind, so I keep the module entry in the returned array.
                     */
                    foreach ($trans as $info) {
                        $mods[] = $info['id'];
                    }
                }

                $mods = array_unique($mods);
                $ret['module'] = $mods;

            } else {
                throw new \Exception("module directory does not exist");
            }

        } else {
            throw new \Exception("tmpDir does not exist");
        }
        return $ret;
    }
}