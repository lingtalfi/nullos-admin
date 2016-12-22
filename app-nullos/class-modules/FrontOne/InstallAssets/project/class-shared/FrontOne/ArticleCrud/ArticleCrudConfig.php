<?php

namespace FrontOne\ArticleCrud;


use FrontOne\Ether;

class ArticleCrudConfig
{

    public static function getArticlesDir()
    {
        return Ether::get('FRONT_ROOT_DIR') . "/articles";
    }

    public static function getArticlesModelsDir()
    {
        return self::getArticlesDir() . "/models";
    }

}