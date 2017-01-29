<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
id_shop,
id_currency
';


$query = "select
%s
from prestashop16.ps_module_currency
";


$table = CrudModule::getDataTable("prestashop16.ps_module_currency", $query, $fields, ['id_module', 'id_shop', 'id_currency']);

$table->title = "Ps module currency";


$table->columnLabels= [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_currency" => "id currency",
];


$table->displayTable();
