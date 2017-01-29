<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_return_state,
color
';


$query = "select
%s
from prestashop16.ps_order_return_state
";


$table = CrudModule::getDataTable("prestashop16.ps_order_return_state", $query, $fields, ['id_order_return_state']);

$table->title = "Ps order return state";


$table->columnLabels= [
    "id_order_return_state" => "id order return state",
    "color" => "color",
];


$table->hiddenColumns = [
    "id_order_return_state",
];


$table->displayTable();
