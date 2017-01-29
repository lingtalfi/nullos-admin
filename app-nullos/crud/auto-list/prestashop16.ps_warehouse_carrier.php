<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_warehouse
';


$query = "select
%s
from prestashop16.ps_warehouse_carrier
";


$table = CrudModule::getDataTable("prestashop16.ps_warehouse_carrier", $query, $fields, ['id_warehouse', 'id_carrier']);

$table->title = "Ps warehouse carrier";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_warehouse" => "id warehouse",
];


$table->displayTable();
