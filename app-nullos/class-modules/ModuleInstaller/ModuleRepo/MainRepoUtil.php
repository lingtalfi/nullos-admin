<?php

namespace ModuleInstaller\ModuleRepo;


use Bat\FileSystemTool;
use Bat\ZipTool;
use ModuleInstaller\ModuleInstallerConfig;

class MainRepoUtil
{
    private static $list = null;

    public static function getModuleInfoList()
    {
        if (null === self::$list) {
            $listUrl = self::getUrl() . "/module-list.json";
            self::$list = json_decode(file_get_contents($listUrl), true);
        }
        return self::$list;
    }

    public static function getRepoId()
    {
        $idUrl = self::getUrl() . "/repo-id.txt";
        return (int)file_get_contents($idUrl);
    }

    public static function downloadModule($module, $dstModuleDir, $progressFunc = null)
    {
        $list = self::getModuleInfoList();
        if (array_key_exists($module, $list)) {
            $info = $list[$module];

            // check if zip exist
            $zipUrl = self::getUrl() . "/modules-zip/$module.zip";
            $headers = get_headers($zipUrl);
            $hasZip = false;
            foreach ($headers as $header) {
                if ('Content-Type: application/zip' === $header) {
                    $hasZip = true;
                    break;
                }
            }
            if (true === $hasZip) {
                $c = file_get_contents($zipUrl);

                $tmpFile = tempnam(APP_ROOT_DIR . "/tmp", '');
                file_put_contents($tmpFile, $c);
                ZipTool::unzip($tmpFile, $dstModuleDir);
                unlink($tmpFile);
            }
//            elseif (array_key_exists('fileList', $info)) {
//                $fileList = $info['fileList'];
//                $prefix = ModuleInstallerConfig::getMainModuleRepoUrl() . "/modules/$module";
//                $n = count($fileList);
//                $i = 1;
//
////                az($dstModuleDir);
////                FileSystemTool::remove($dstModuleDir);
//
//
//                foreach ($fileList as $file) {
//                    $url = $prefix . '/' . $file;
//
//                    if (null !== $progressFunc) {
//                        call_user_func($progressFunc, $file, $i, $n);
//                    }
//                    $content = file_get_contents($url);
//                    $dstFile = $dstModuleDir . '/' . $file;
//                    $dstDir = dirname($dstFile);
//                    if (false === is_dir($dstDir)) {
//                        mkdir($dstDir, 0777, true);
//                    }
//                    file_put_contents($dstFile, $content);
//                    $i++;
//                }
//            }
            else {
                throw new \Exception("Don't know how to download the module yet");
            }
        } else {
            throw new \Exception("module not found: $module");
        }

    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function getUrl()
    {
        return ModuleInstallerConfig::getMainModuleRepoUrl();

    }
}