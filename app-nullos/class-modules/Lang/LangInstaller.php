<?php


namespace Lang;

use Installer\Installer;
use Installer\ModuleInstallerInterface;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayTopBarOperation;
use Installer\Report\Report;


class LangInstaller implements ModuleInstallerInterface
{
    public function install()
    {
        /**
         * Hook into:
         * - class/Layout/LayoutBridge
         */
        $installer = new Installer();
        $installer->addOperation(LayoutBridgeDisplayTopBarOperation::create()->setLocationTransformerAppend('LangModule::displayTopBar()'));

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    public function uninstall()
    {
        $installer = new Installer();
        $installer->addOperation(LayoutBridgeDisplayTopBarOperation::create()->setLocationTransformerRemoveBySubstr('LangModule'));


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}