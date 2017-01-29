<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_group
';


$query = "select
%s
from prestashop16.ps_carrier_group
";


$table = CrudModule::getDataTable("prestashop16.ps_carrier_group", $query, $fields, ['id_carrier', 'id_group']);

$table->title = "Ps carrier group";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_group" => "id group",
];


$table->displayTable();
