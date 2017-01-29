<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_request_sql,
name,
sql
';


$query = "select
%s
from prestashop16.ps_request_sql
";


$table = CrudModule::getDataTable("prestashop16.ps_request_sql", $query, $fields, ['id_request_sql']);

$table->title = "Ps request sql";


$table->columnLabels= [
    "id_request_sql" => "id request sql",
    "name" => "name",
    "sql" => "sql",
];


$table->hiddenColumns = [
    "id_request_sql",
];


$n = 30;
$table->setTransformer('sql', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
