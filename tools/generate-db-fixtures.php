<?php


use BullSheet\Generator\LingBullSheetGenerator;
use QuickPdo\QuickPdo;


require "bigbang.php";

// db
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'zilu';


QuickPdo::setConnection("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')), NAMES 'utf8'",
//    PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'STRICT_TRANS_TABLES','')), NAMES 'utf8'",
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);


ini_set('display_errors', 1);


$b = LingBullSheetGenerator::create()->setDir("/Volumes/Macintosh HD 2/it/php/projects/bullsheets-repo/bullsheets");
function getId(array $ids)
{
    return $ids[rand(0, count($ids) - 1)];
}

//--------------------------------------------
//
//--------------------------------------------
$nbArticles = 100;
$nbCommandes = 100;
$nbFournisseur = 100;
$nbContainer = 20;
$nbFournisseurHasArticle = 1000;
$nbContainerHasArticle = 800;
$nbCommandeHasArticle = 1000;


$articleIds = [];
$commandeIds = [];
$fournisseurIds = [];
$containerIds = [];


for ($i = 0; $i < $nbArticles; $i++) {
    if (false !== ($id = QuickPdo::insert('article', [
            'reference_lf' => $b->letters(5),
            'reference_hldp' => $b->letters(5),
            'prix' => $b->float(3, 2),
            'poids' => $b->float(3, 2),
            'descr_fr' => $b->loremSentence(2, 3),
            'descr_en' => $b->loremSentence(2, 3),
        ]))
    ) {
        $articleIds[] = $id;
    }
}


for ($i = 0; $i < $nbCommandes; $i++) {
    if (false !== ($id = QuickPdo::insert('commande', [
            'reference' => $b->letters(8),
        ]))
    ) {
        $commandeIds[] = $id;
    }
}


for ($i = 0; $i < $nbFournisseur; $i++) {
    if (false !== ($id = QuickPdo::insert('fournisseur', [
            'nom' => $b->lastName(),
        ]))
    ) {
        $fournisseurIds[] = $id;
    }
}

for ($i = 0; $i < $nbContainer; $i++) {
    if (false !== ($id = QuickPdo::insert('container', [
            'nom' => 'C' . sprintf('%02s', $i),
        ]))
    ) {
        $containerIds[] = $id;
    }
}

for ($i = 0; $i < $nbFournisseurHasArticle; $i++) {
    QuickPdo::insert('fournisseur_has_article', [
        'fournisseur_id' => getId($fournisseurIds),
        'article_id' => getId($articleIds),
        'reference' => $b->letters(5),
    ]);
}

for ($i = 0; $i < $nbContainerHasArticle; $i++) {
    QuickPdo::insert('container_has_article', [
        'container_id' => getId($containerIds),
        'article_id' => getId($articleIds),
    ]);
}

for ($i = 0; $i < $nbCommandeHasArticle; $i++) {
    QuickPdo::insert('commande_has_article', [
        'commande_id' => getId($commandeIds),
        'article_id' => getId($articleIds),
    ]);
}







