<?php


namespace Crud;

use Installer\Installer;
use Installer\ModuleInstallerInterface;
use Installer\Operation\DeployFile\DeployFileOperation;
use Installer\Operation\DeployFile\RemoveFileOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayToolsLeftMenuLinksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;


class CrudInstaller implements ModuleInstallerInterface
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
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerAfter('CrudModule::displayToolsLeftMenuLinks()', 'BootModule'));
        $installer->addOperation(LayoutBridgeDisplayLeftMenuBlocksOperation::create()->setLocationTransformerAfter('CrudModule::displayLeftMenuBlocks()', 'ToolsLeftMenuSectionModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend('CrudModule::decorateUri2PagesMap($uri2pagesMap)'));
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
        $installer->addOperation(LayoutBridgeDisplayToolsLeftMenuLinksOperation::create()->setLocationTransformerRemoveBySubstr('CrudModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr('CrudModule'));
        $installer->addOperation(RemoveFileOperation::create()
            ->sources([
                'assets/modules/crud',
                /**
                 * Note: left the lang,
                 * because other modules use the Crud module (ArrayDataTable),
                 * which needs the translations...
                 */
//                'lang/en/modules/crud',
//                'lang/fr/modules/crud',
                'layout-elements/nullos/modules/crud',
                'pages/modules/crud',
                /**
                 * Note: I left the app-nullos/crud directory alone, because they can contain user information
                 */
            ])
            ->destDir(APP_ROOT_DIR));


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}