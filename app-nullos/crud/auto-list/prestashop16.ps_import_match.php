<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_import_match,
name,
match,
skip
';


$query = "select
%s
from prestashop16.ps_import_match
";


$table = CrudModule::getDataTable("prestashop16.ps_import_match", $query, $fields, ['id_import_match']);

$table->title = "Ps import match";


$table->columnLabels= [
    "id_import_match" => "id import match",
    "name" => "name",
    "match" => "match",
    "skip" => "skip",
];


$table->hiddenColumns = [
    "id_import_match",
];


$n = 30;
$table->setTransformer('match', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
