<?php



echo "nope";
exit;

use Crud\CrudConfig;
use Crud\CrudFormGenerator;


$gen = new CrudFormGenerator();
$gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
$gen->prettyTableNames = CrudConfig::getPrettyTableNames();
$gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();


$table = "configuration";
ob_start();
$gen->generateForm($table);
echo nl2br(ob_get_clean());




