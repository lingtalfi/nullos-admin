<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
id_shop,
enable_device
';


$query = "select
%s
from prestashop16.ps_module_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_module_shop", $query, $fields, ['id_module', 'id_shop']);

$table->title = "Ps module shop";


$table->columnLabels= [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "enable_device" => "enable device",
];


$table->displayTable();
