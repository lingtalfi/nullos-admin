<?php


namespace FrontOne\ArticleCrud;


use FrontOne\ArticleList;

class ArticleCrudModule
{
    public static function registerArticles(ArticleList $list)
    {
        ArticleScannerUtil::getAllArticles($list);
    }

}