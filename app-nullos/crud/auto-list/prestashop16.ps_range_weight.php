<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_range_weight,
id_carrier,
delimiter1,
delimiter2
';


$query = "select
%s
from prestashop16.ps_range_weight
";


$table = CrudModule::getDataTable("prestashop16.ps_range_weight", $query, $fields, ['id_range_weight']);

$table->title = "Ps range weight";


$table->columnLabels= [
    "id_range_weight" => "id range weight",
    "id_carrier" => "id carrier",
    "delimiter1" => "delimiter1",
    "delimiter2" => "delimiter2",
];


$table->hiddenColumns = [
    "id_range_weight",
];


$table->displayTable();
