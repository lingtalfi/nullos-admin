<?php


namespace Linguist;

use Installer\WithToolsLeftMenuModuleInstaller;


class LinguistInstaller extends WithToolsLeftMenuModuleInstaller
{
    protected function getLeftMenuPosition()
    {
        return 5;
    }
}