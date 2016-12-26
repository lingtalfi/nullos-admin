<?php


namespace Crud;


use Installer\BaseModuleInstaller;
use Installer\Saas\ModuleSaasInterface;


class CrudInstaller extends BaseModuleInstaller implements ModuleSaasInterface
{



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


    //------------------------------------------------------------------------------/
    // SAAS
    //------------------------------------------------------------------------------/
    public function getSubscriberServiceIds()
    {
        return [
            'ToolsLeftMenuSection.displayToolsLeftMenuLinks:2',
            'Router.decorateUri2PagesMap',
            'Layout.displayLeftMenuBlocks',
        ];
    }
}