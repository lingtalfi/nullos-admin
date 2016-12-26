<?php


namespace Linguist;

use Installer\BaseModuleInstaller;
use Installer\Saas\ModuleSaasInterface;


class LinguistInstaller extends BaseModuleInstaller implements ModuleSaasInterface
{
    //------------------------------------------------------------------------------/
    // SAAS
    //------------------------------------------------------------------------------/
    public function getSubscriberServiceIds()
    {
        return [
            'ToolsLeftMenuSection.displayToolsLeftMenuLinks:5',
            'Router.decorateUri2PagesMap',
        ];
    }
}