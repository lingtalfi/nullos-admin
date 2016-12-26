<?php


namespace Layout;

use Boot\BootModule;
use Crud\CrudModule;
use FrontOne\FrontOneModule;
use IconsViewer\IconsViewerModule;
use Lang\LangModule;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use Linguist\LinguistModule;
use ModuleInstaller\ModuleInstallerModule;
use NullosInfo\NullosInfoModule;
use QuickDoc\QuickDocModule;
use SqlTools\SqlToolsModule;
use ToolsLeftMenuSection\ToolsLeftMenuSectionModule;

class LayoutServices
{
    /**
     * Owned by:
     * - class/Layout
     */
    public static function registerAssets(AssetsList $assetsList)
    {
        \LayoutDynamicHead\LayoutDynamicHeadModule::registerAssets($assetsList);
    }

    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayLeftMenuBlocks()
   {
        ToolsLeftMenuSectionModule::displayLeftMenuBlocks();
    }


    /**
     * Owned by:
     * - class/Layout
     */
    public static function displayTopBar()
    {
        \Lang\LangModule::displayTopBar();
    }

}