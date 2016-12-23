<?php


namespace Installer;


use Installer\Operation\LayoutBridge\LayoutBridgeDisplayToolsLeftMenuLinksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;

abstract class WithToolsLeftMenuModuleInstaller extends WithPackModuleInstaller
{

    public function install()
    {
        $moduleClass = $this->getModuleClass() . 'Module';

        $pos = (int)$this->getLeftMenuPosition();

        $this->getSourceDir();
        /**
         * Deploy Files:
         * - assets/modules/$$/
         * - pages/modules/$$/
         * - layout-elements/nullos/modules/$$/
         * - lang/++/modules/$$/
         *
         *
         * Hook into:
         * - class/Router/RouterBridge
         * - class/Layout/LayoutBridge
         */
        $installer = new Installer();
        $this->onInstallBefore($installer);
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerByPosition($moduleClass . '::displayToolsLeftMenuLinks()', $pos));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend($moduleClass . '::decorateUri2PagesMap($uri2pagesMap)'));


        $this->prepareDeployFiles($installer);


        $report = new Report();
        $installer->run($report);
        return $report;
    }

    public function uninstall()
    {
        $moduleClass = $this->getModuleClass();
        $moduleClassName = $moduleClass . 'Module';


        $installer = new Installer();
        $this->onUninstallBefore($installer);
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerRemoveBySubstr($moduleClassName));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr($moduleClassName));

        $this->prepareRemoveFiles($installer);


        $report = new Report();
        $installer->run($report);
        return $report;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function getLeftMenuPosition()
    {
        return 0;
    }
}