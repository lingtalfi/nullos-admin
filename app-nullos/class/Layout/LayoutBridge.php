<?php


namespace Layout;

use Boot\BootModule;
use Crud\CrudModule;
use FrontOne\FrontOneModule;
use IconsViewer\IconsViewerModule;
use Lang\LangModule;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use LeftMenuSection\Tools\ToolsLeftMenuSectionModule;
use Linguist\LinguistModule;
use ModuleInstaller\ModuleInstallerModule;
use NullosInfo\NullosInfoModule;
use QuickDoc\QuickDocModule;
use SqlTools\SqlToolsModule;

class LayoutBridge
{
    /**
     * Owned by:
     * - class/Layout
     */
    public static function registerAssets(AssetsList $assetsList)
    {
//        QuickDocModule::registerAssets($assetsList);
        LayoutDynamicHeadModule::registerAssets($assetsList);
    }

    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayLeftMenuBlocks()
   {
        ToolsLeftMenuSectionModule::displayLeftMenuBlocks();
        FrontOneModule::displayLeftMenuBlocks();
        CrudModule::displayLeftMenuBlocks();
   }


    /**
     * Owned by:
     * - class-modules/LeftMenuSection/Tools/ToolsLeftMenuSectionModule
     */
    public static function displayToolsLeftMenuLinks()
   {
        QuickDocModule::displayToolsLeftMenuLinks();
        BootModule::displayToolsLeftMenuLinks();
        SqlToolsModule::displayToolsLeftMenuLinks();
        CrudModule::displayToolsLeftMenuLinks();
        ModuleInstallerModule::displayToolsLeftMenuLinks();
        NullosInfoModule::displayToolsLeftMenuLinks();
        LinguistModule::displayToolsLeftMenuLinks();
        IconsViewerModule::displayToolsLeftMenuLinks();
   }


    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayTopBar()
   {
        LangModule::displayTopBar();
   }

}