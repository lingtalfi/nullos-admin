<?php


namespace ArticleScanner;


use Bat\FileSystemTool;

class ArticleScannerModule
{
    public static function registerArticles(\ArticleList $list)
    {
        $dir = ArticleScannerConfig::getArticlesDir();
        $files = scandir($dir);
        foreach ($files as $file) {
            if ('.' !== $file && '..' !== $file) {
                if ('php' === strtolower(FileSystemTool::getFileExtension($file))) {

                    $article = null;
                    $realFile = $dir . '/' . $file;
                    require $realFile;
                    $list->addArticle($article);
                }
            }
        }
        $list->setOrder(ArticleScannerConfig::getArticlesOrder());

        $disabled = ArticleScannerConfig::getDisabledArticles();
        if (is_array($disabled)) {
            foreach ($disabled as $anchor) {
                $list->removeArticle($anchor);
            }
        }

    }

}