<?php


namespace ApplicationLog;


use Installer\ModuleInstaller;
use Installer\Saas\ModuleSaasInterface;


class ApplicationLogInstaller extends ModuleInstaller implements ModuleSaasInterface
{




    //------------------------------------------------------------------------------/
    // SAAS
    //------------------------------------------------------------------------------/
    public function getSubscriberServiceIds()
    {
        return [
            'LogWatcher.decorateLogToWatch',
        ];
    }
}