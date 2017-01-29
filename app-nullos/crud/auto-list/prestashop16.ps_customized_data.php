<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customization,
type,
index,
value
';


$query = "select
%s
from prestashop16.ps_customized_data
";


$table = CrudModule::getDataTable("prestashop16.ps_customized_data", $query, $fields, ['id_customization', 'type', 'index']);

$table->title = "Ps customized data";


$table->columnLabels= [
    "id_customization" => "id customization",
    "type" => "type",
    "index" => "index",
    "value" => "value",
];


$table->displayTable();
