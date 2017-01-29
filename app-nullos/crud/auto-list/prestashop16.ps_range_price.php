<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_range_price,
id_carrier,
delimiter1,
delimiter2
';


$query = "select
%s
from prestashop16.ps_range_price
";


$table = CrudModule::getDataTable("prestashop16.ps_range_price", $query, $fields, ['id_range_price']);

$table->title = "Ps range price";


$table->columnLabels= [
    "id_range_price" => "id range price",
    "id_carrier" => "id carrier",
    "delimiter1" => "delimiter1",
    "delimiter2" => "delimiter2",
];


$table->hiddenColumns = [
    "id_range_price",
];


$table->displayTable();
