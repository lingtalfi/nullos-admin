<?php


namespace Boot;


use Installer\WithToolsLeftMenuModuleInstaller;


class BootInstaller extends WithToolsLeftMenuModuleInstaller
{

    protected function getLeftMenuPosition()
    {
        return 0;
    }
}