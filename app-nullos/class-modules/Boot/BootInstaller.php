<?php


namespace Boot;

use Installer\Installer;
use Installer\ModuleInstallerInterface;
use Installer\Operation\DeployFile\DeployFileOperation;
use Installer\Operation\DeployFile\RemoveFileOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayToolsLeftMenuLinksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;


class BootInstaller implements ModuleInstallerInterface
{
    public static function install()
    {
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
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerAfter('BootModule::displayToolsLeftMenuLinks()', 'QuickDocModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend('BootModule::decorateUri2PagesMap($uri2pagesMap)'));
        $installer->addOperation(DeployFileOperation::create()
            ->sourceDir(__DIR__ . "/InstallAssets/app-nullos")
            ->destDir(APP_ROOT_DIR)
        );

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    public static function uninstall()
    {
        $installer = new Installer();
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerRemoveBySubstr('BootModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr('BootModule'));
        $installer->addOperation(RemoveFileOperation::create()
            ->sources([
                'lang/en/modules/boot',
                'lang/fr/modules/boot',
                'layout-elements/nullos/modules/boot',
                'pages/modules/boot',
            ])
            ->destDir(APP_ROOT_DIR));


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}