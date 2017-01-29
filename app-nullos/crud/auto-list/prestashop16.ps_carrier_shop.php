<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_shop
';


$query = "select
%s
from prestashop16.ps_carrier_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_carrier_shop", $query, $fields, ['id_carrier', 'id_shop']);

$table->title = "Ps carrier shop";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_shop" => "id shop",
];


$table->displayTable();
