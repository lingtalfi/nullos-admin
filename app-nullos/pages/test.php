<?php


use Crud\CrudConfig;
use Crud\CrudListGenerator;

$gen = new CrudListGenerator();
$gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
$gen->prettyTableNames = CrudConfig::getPrettyTableNames();
$gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();


$gen->urlTransformerIf = CrudConfig::getListUrlTransformerIfCallback();


$gen->db = "oui";
$gen->db = "information_schema";

$table = "concours";
$table = "equipe_has_membres";
$table = "CHARACTER_SETS";


ob_start();
$gen->generateList($table);
echo nl2br(ob_get_clean());



