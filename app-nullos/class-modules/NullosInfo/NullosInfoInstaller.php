<?php


namespace NullosInfo;


use Installer\WithToolsLeftMenuModuleInstaller;


class NullosInfoInstaller extends WithToolsLeftMenuModuleInstaller
{
    protected function getLeftMenuPosition()
    {
        return -1;
    }
}