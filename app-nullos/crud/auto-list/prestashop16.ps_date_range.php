<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_date_range,
time_start,
time_end
';


$query = "select
%s
from prestashop16.ps_date_range
";


$table = CrudModule::getDataTable("prestashop16.ps_date_range", $query, $fields, ['id_date_range']);

$table->title = "Ps date range";


$table->columnLabels= [
    "id_date_range" => "id date range",
    "time_start" => "time start",
    "time_end" => "time end",
];


$table->hiddenColumns = [
    "id_date_range",
];


$table->displayTable();
