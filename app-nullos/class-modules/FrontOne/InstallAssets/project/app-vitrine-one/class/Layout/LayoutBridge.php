<?php


namespace Layout;

use FrontOne\ArticleList;
use FrontOne\ArticleCrud\ArticleCrudModule;
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
    public static function registerArticles(ArticleList $list)
    {
        ArticleCrudModule::registerArticles($list);
    }

}