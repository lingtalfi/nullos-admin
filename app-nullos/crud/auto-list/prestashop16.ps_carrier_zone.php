<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_zone
';


$query = "select
%s
from prestashop16.ps_carrier_zone
";


$table = CrudModule::getDataTable("prestashop16.ps_carrier_zone", $query, $fields, ['id_carrier', 'id_zone']);

$table->title = "Ps carrier zone";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_zone" => "id zone",
];


$table->displayTable();
