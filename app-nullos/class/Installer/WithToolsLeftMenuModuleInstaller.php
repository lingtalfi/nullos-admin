<?php


namespace Installer;


use Bat\FileSystemTool;
use Installer\Operation\DeployFile\DeployFileOperation;
use Installer\Operation\DeployFile\RemoveFileOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayToolsLeftMenuLinksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;

abstract class WithToolsLeftMenuModuleInstaller extends ModuleInstaller
{

    public function install()
    {
        $moduleClass = $this->getModuleClass() . 'Module';

        $this->getSourceDir();
        /**
         * Deploy Files:
         * - /pages/modules/$$/
         * - /layout-elements/nullos/modules/$$/
         * - /lang/++/modules/$$/
         *
         *
         * Hook into:
         * - class/Router/RouterBridge
         * - class/Layout/LayoutBridge
         */
        $installer = new Installer();
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerAppend($moduleClass . '::displayToolsLeftMenuLinks()'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend($moduleClass . '::decorateUri2PagesMap($uri2pagesMap)'));
        $installer->addOperation(DeployFileOperation::create()
            ->sourceDir($this->getSourceDir())
            ->destDir($this->getTargetDir())
        );

        $report = new Report();
        $installer->run($report);
        return $report;
    }

    public function uninstall()
    {
        $moduleClass = $this->getModuleClass();
        $moduleClassName = $moduleClass . 'Module';


        $sources = $this->getSources();

        $installer = new Installer();
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerRemoveBySubstr($moduleClassName));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr($moduleClassName));
        $installer->addOperation(RemoveFileOperation::create()
            ->sources($sources)
            ->destDir($this->getTargetDir()));


        $report = new Report();
        $installer->run($report);
        return $report;
    }


    /**
     * Development feature
     */
    public function pack()
    {
        $report = new Report();


        $sources = $this->getSources();
        $targetDir = $this->getTargetDir();
        $sourceDir = $this->getSourceDir();

        foreach ($sources as $source) {
            $extSrc = $targetDir . '/' . $source;
            $intDst = $sourceDir . "/" . $source;
            if (is_dir($extSrc)) {
                $errors = [];
                FileSystemTool::copyDir($extSrc, $intDst, true, $errors);
                if (count($errors) > 0) {
                    $report->addMessage($errors);
                }
            } else {
                $dirName = dirname($intDst);
                if (!file_exists($dirName)) {
                    mkdir($dirName, 0777, true);
                }
                copy($extSrc, $intDst);
            }
        }

        return $report;

    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private function getModuleClass()
    {
        $calledClass = get_called_class();
        $p = explode('\\', $calledClass, 2);
        $moduleName = $p[0];
        return $moduleName;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getLanguages()
    {
        return [
            'en',
            'fr',
        ];
    }

    protected function hasAsset()
    {
        return false;
    }



    //------------------------------------------------------------------------------/
    // getSources, getTargetDir and getSourceDir
    // work together to implement the packing system
    //------------------------------------------------------------------------------/
    protected function getSources()
    {
        $moduleClass = $this->getModuleClass();
        $moduleClassLower = lcfirst($moduleClass);

        $sources = [
            'layout-elements/nullos/modules/' . $moduleClassLower,
            'pages/modules/' . $moduleClassLower,
        ];

        if (true === $this->hasAsset()) {
            $sources[] = 'assets/modules/' . $moduleClassLower;
        }


        $langs = $this->getLanguages();
        foreach ($langs as $lang) {
            $sources[] = 'lang/' . $lang . '/modules/' . $moduleClassLower;
        }
        return $sources;
    }

    protected function getTargetDir()
    {
        return APP_ROOT_DIR;
    }

    protected function getSourceDir()
    {
        $inst = new \ReflectionClass($this);
        return dirname($inst->getFileName()) . "/InstallAssets/app-nullos";
    }
}