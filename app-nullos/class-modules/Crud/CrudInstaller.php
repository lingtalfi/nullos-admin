<?php


namespace Crud;


use Installer\InstallerInterface;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation;
use Installer\WithToolsLeftMenuModuleInstaller;


class CrudInstaller extends WithToolsLeftMenuModuleInstaller
{

    protected function getLeftMenuPosition()
    {
        return 2;
    }


    protected function onInstallBefore(InstallerInterface $installer)
    {
        $installer->addOperation(LayoutBridgeDisplayLeftMenuBlocksOperation::create()->setLocationTransformerAfter('CrudModule::displayLeftMenuBlocks()', 'ToolsLeftMenuSectionModule'));
    }

    protected function onUninstallBefore(InstallerInterface $installer)
    {
        $installer->addOperation(LayoutBridgeDisplayLeftMenuBlocksOperation::create()->setLocationTransformerRemoveBySubstr('CrudModule'));
    }

    protected function getSources()
    {
        return [
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
        ];
    }
}