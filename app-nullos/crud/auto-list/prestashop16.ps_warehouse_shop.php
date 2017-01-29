<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_shop,
id_warehouse
';


$query = "select
%s
from prestashop16.ps_warehouse_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_warehouse_shop", $query, $fields, ['id_warehouse', 'id_shop']);

$table->title = "Ps warehouse shop";


$table->columnLabels= [
    "id_shop" => "id shop",
    "id_warehouse" => "id warehouse",
];


$table->displayTable();
