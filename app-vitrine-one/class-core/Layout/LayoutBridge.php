<?php


namespace Layout;

use FrontOne\ArticleList;
use FrontOne\ArticleCrud\ArticleCrudModule;

class LayoutBridge
{

    /**
     * Owned by:
     * - class/Layout
     */
    public static function registerArticles(ArticleList $list)
    {
        ArticleCrudModule::registerArticles($list);
    }

}