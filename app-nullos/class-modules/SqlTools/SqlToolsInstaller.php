<?php


namespace SqlTools;


use Installer\WithToolsLeftMenuModuleInstaller;


class SqlToolsInstaller  extends WithToolsLeftMenuModuleInstaller
{
    protected function getLeftMenuPosition()
    {
        return 3;
    }
}