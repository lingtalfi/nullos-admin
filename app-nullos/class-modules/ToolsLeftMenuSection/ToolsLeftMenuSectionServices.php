<?php

namespace ToolsLeftMenuSection;


class ToolsLeftMenuSectionServices
{


    /**
     * Owned by:
     * - class-modules/LeftMenuSection/Tools/ToolsLeftMenuSectionModule
     */
    public static function displayToolsLeftMenuLinks()
    {
        \Boot\BootModule::displayToolsLeftMenuLinks();
        \IconsViewer\IconsViewerModule::displayToolsLeftMenuLinks();
        \ModuleInstaller\ModuleInstallerModule::displayToolsLeftMenuLinks();
        \NullosInfo\NullosInfoModule::displayToolsLeftMenuLinks();
        \Linguist\LinguistModule::displayToolsLeftMenuLinks();
        \QuickDoc\QuickDocModule::displayToolsLeftMenuLinks();
        \SqlTools\SqlToolsModule::displayToolsLeftMenuLinks();
        \LogWatcher\LogWatcherModule::displayToolsLeftMenuLinks();
    }


}