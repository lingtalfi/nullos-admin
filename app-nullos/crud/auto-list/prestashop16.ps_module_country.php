<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
id_shop,
id_country
';


$query = "select
%s
from prestashop16.ps_module_country
";


$table = CrudModule::getDataTable("prestashop16.ps_module_country", $query, $fields, ['id_module', 'id_shop', 'id_country']);

$table->title = "Ps module country";


$table->columnLabels= [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_country" => "id country",
];


$table->displayTable();
