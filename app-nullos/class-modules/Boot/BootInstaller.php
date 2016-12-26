<?php


namespace Boot;


use Installer\Saas\ModuleSaasInterface;
use Installer\BaseModuleInstaller;


class BootInstaller extends BaseModuleInstaller implements ModuleSaasInterface
{


    //------------------------------------------------------------------------------/
    // SAAS
    //------------------------------------------------------------------------------/
    public function getSubscriberServiceIds()
    {
        return [
            'ToolsLeftMenuSection.displayToolsLeftMenuLinks:0',
            'Router.decorateUri2PagesMap',
        ];
    }


}