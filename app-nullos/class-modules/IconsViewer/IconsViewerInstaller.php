<?php


namespace IconsViewer;


use Installer\WithToolsLeftMenuModuleInstaller;


class IconsViewerInstaller extends WithToolsLeftMenuModuleInstaller
{
    protected function getLeftMenuPosition()
    {
        return 100;
    }


}