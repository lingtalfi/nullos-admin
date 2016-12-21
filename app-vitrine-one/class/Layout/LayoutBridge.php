<?php


namespace Layout;

use ArticleScanner\ArticleScannerModule;
use LayoutDynamicHead\LayoutDynamicHeadModule;

class LayoutBridge
{
    /**
     * Owned by:
     * - class/Layout
     */
    public static function registerAssets(AssetsList $assetsList)
    {
        LayoutDynamicHeadModule::registerAssets($assetsList);
    }

    /**
     * Owned by:
     * - class/Layout
     */
    public static function registerArticles(\ArticleList $list)
    {
        ArticleScannerModule::registerArticles($list);
    }

}