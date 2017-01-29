<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_log,
severity,
error_code,
message,
object_type,
object_id,
id_employee,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_log
";


$table = CrudModule::getDataTable("prestashop16.ps_log", $query, $fields, ['id_log']);

$table->title = "Ps log";


$table->columnLabels= [
    "id_log" => "id log",
    "severity" => "severity",
    "error_code" => "error code",
    "message" => "message",
    "object_type" => "object type",
    "object_id" => "object",
    "id_employee" => "id employee",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_log",
];


$n = 30;
$table->setTransformer('message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
