<?php


namespace Layout;

use Boot\BootModule;
use Crud\CrudModule;
use Lang\LangModule;
use LayoutDynamicHead\LayoutDynamicHeadModule;
use LeftMenuSection\Tools\ToolsLeftMenuSectionModule;
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
        CrudModule::displayLeftMenuBlocks();
    }


    /**
     * Owned by:
     * - class-modules/LeftMenuSection/Tools/ToolsLeftMenuSectionModule
     */
    public static function displayToolsLeftMenuLinks()
    {
        BootModule::displayToolsLeftMenuLinks();
        CrudModule::displayToolsLeftMenuLinks();
        SqlToolsModule::displayToolsLeftMenuLinks();
        QuickDocModule::displayToolsLeftMenuLinks();
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