<?php


namespace QuickDoc;


use Installer\WithToolsLeftMenuModuleInstaller;


class QuickDocInstaller extends WithToolsLeftMenuModuleInstaller
{
    protected function getLeftMenuPosition()
    {
        return 4;
    }
}