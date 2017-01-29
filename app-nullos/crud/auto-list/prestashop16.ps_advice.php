<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_advice,
id_ps_advice,
id_tab,
ids_tab,
validated,
hide,
location,
selector,
start_day,
stop_day,
weight
';


$query = "select
%s
from prestashop16.ps_advice
";


$table = CrudModule::getDataTable("prestashop16.ps_advice", $query, $fields, ['id_advice']);

$table->title = "Ps advice";


$table->columnLabels= [
    "id_advice" => "id advice",
    "id_ps_advice" => "id ps advice",
    "id_tab" => "id tab",
    "ids_tab" => "ids tab",
    "validated" => "validated",
    "hide" => "hide",
    "location" => "location",
    "selector" => "selector",
    "start_day" => "start day",
    "stop_day" => "stop day",
    "weight" => "weight",
];


$table->hiddenColumns = [
    "id_advice",
];


$n = 30;
$table->setTransformer('ids_tab', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
