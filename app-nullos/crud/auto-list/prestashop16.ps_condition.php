<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_condition,
id_ps_condition,
type,
request,
operator,
value,
result,
calculation_type,
calculation_detail,
validated,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_condition
";


$table = CrudModule::getDataTable("prestashop16.ps_condition", $query, $fields, ['id_condition', 'id_ps_condition']);

$table->title = "Ps condition";


$table->columnLabels= [
    "id_condition" => "id condition",
    "id_ps_condition" => "id ps condition",
    "type" => "type",
    "request" => "request",
    "operator" => "operator",
    "value" => "value",
    "result" => "result",
    "calculation_type" => "calculation type",
    "calculation_detail" => "calculation detail",
    "validated" => "validated",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_condition",
];


$n = 30;
$table->setTransformer('request', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
