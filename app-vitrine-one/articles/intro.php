
<?php


use Shared\FrontOne\FileArticle;

$article = new FileArticle();
$article->setAnchor("intro");
$article->setLabel("Introooo");
$article->setPosition(0);
$article->setIsProtected(true);
$article->setIsActive(true);
$article->setFile(__DIR__ . "/content/intro.php");        
        