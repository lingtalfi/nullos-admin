<?php


namespace NullosInfo;

use Installer\Installer;
use Installer\ModuleInstallerInterface;
use Installer\Operation\DeployFile\DeployFileOperation;
use Installer\Operation\DeployFile\RemoveFileOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayToolsLeftMenuLinksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;


class NullosInfoInstaller implements ModuleInstallerInterface
{
    public static function install()
    {
        /**
         * Deploy Files:
         * - /assets/modules/$$/
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
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerAfter('NullosInfoModule::displayToolsLeftMenuLinks()', 'QuickDocModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend('NullosInfoModule::decorateUri2PagesMap($uri2pagesMap)'));
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
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerRemoveBySubstr('NullosInfoModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr('NullosInfoModule'));
        $installer->addOperation(RemoveFileOperation::create()
            ->sources([
                'assets/modules/nullosInfo',
                'lang/en/modules/nullosInfo',
                'lang/fr/modules/nullosInfo',
                'layout-elements/nullos/modules/nullosInfo',
                'pages/modules/nullosInfo',
            ])
            ->destDir(APP_ROOT_DIR));


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}