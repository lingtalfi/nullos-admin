<?php


namespace LogWatcher;


use Installer\Saas\ModuleSaasInterface;
use Installer\BaseModuleInstaller;


class LogWatcherInstaller extends BaseModuleInstaller implements ModuleSaasInterface
{
    protected function getLeftMenuPosition()
    {
        return 1001;
    }

    public function getSubscriberServiceIds()
    {
        return [
            'ToolsLeftMenuSection.displayToolsLeftMenuLinks',
            'Router.decorateUri2PagesMap',
        ];
    }

}