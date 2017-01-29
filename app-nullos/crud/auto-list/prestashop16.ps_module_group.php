<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
id_shop,
id_group
';


$query = "select
%s
from prestashop16.ps_module_group
";


$table = CrudModule::getDataTable("prestashop16.ps_module_group", $query, $fields, ['id_module', 'id_shop', 'id_group']);

$table->title = "Ps module group";


$table->columnLabels= [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_group" => "id group",
];


$table->displayTable();
