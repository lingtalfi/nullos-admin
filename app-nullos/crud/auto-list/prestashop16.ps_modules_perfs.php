<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_modules_perfs,
session,
module,
method,
time_start,
time_end,
memory_start,
memory_end
';


$query = "select
%s
from prestashop16.ps_modules_perfs
";


$table = CrudModule::getDataTable("prestashop16.ps_modules_perfs", $query, $fields, ['id_modules_perfs']);

$table->title = "Ps modules perfs";


$table->columnLabels= [
    "id_modules_perfs" => "id modules perfs",
    "session" => "session",
    "module" => "module",
    "method" => "method",
    "time_start" => "time start",
    "time_end" => "time end",
    "memory_start" => "memory start",
    "memory_end" => "memory end",
];


$table->hiddenColumns = [
    "id_modules_perfs",
];


$table->displayTable();
