<?php


namespace ArticleScanner;


class ArticleScannerConfig
{


    public static function getArticlesOrder()
    {
        return [
            'intro',
            'work',
            'about',
            'contact',
            'elements',
        ];
    }

    public static function getDisabledArticles()
    {
        return [
            'elements',
        ];
    }


    public static function getArticlesDir()
    {
        return APP_ROOT_DIR . "/articles";
    }


}