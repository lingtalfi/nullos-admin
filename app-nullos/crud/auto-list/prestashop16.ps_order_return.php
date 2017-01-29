<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_return,
id_customer,
id_order,
state,
question,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_order_return
";


$table = CrudModule::getDataTable("prestashop16.ps_order_return", $query, $fields, ['id_order_return']);

$table->title = "Ps order return";


$table->columnLabels= [
    "id_order_return" => "id order return",
    "id_customer" => "id customer",
    "id_order" => "id order",
    "state" => "state",
    "question" => "question",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_order_return",
];


$n = 30;
$table->setTransformer('question', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
