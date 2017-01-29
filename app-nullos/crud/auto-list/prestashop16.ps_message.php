<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_message,
id_cart,
id_customer,
id_employee,
id_order,
message,
private,
date_add
';


$query = "select
%s
from prestashop16.ps_message
";


$table = CrudModule::getDataTable("prestashop16.ps_message", $query, $fields, ['id_message']);

$table->title = "Ps message";


$table->columnLabels= [
    "id_message" => "id message",
    "id_cart" => "id cart",
    "id_customer" => "id customer",
    "id_employee" => "id employee",
    "id_order" => "id order",
    "message" => "message",
    "private" => "private",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_message",
];


$n = 30;
$table->setTransformer('message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
