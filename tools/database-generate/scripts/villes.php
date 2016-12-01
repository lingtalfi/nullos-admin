<?php


use QuickPdo\QuickPdo;

require "bigbang.php";


QuickPdo::setConnection("mysql:host=localhost;dbname=ville", 'root', 'root', [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
]);

$res = QuickPdo::fetchAll('select ville_nom_reel from villes_france_free');
foreach ($res as $item) {
    echo $item['ville_nom_reel'] . "<br>";
}