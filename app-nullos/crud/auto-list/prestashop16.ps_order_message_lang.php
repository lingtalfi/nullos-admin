<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_message,
id_lang,
name,
message
';


$query = "select
%s
from prestashop16.ps_order_message_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_order_message_lang", $query, $fields, ['id_order_message', 'id_lang']);

$table->title = "Ps order message lang";


$table->columnLabels= [
    "id_order_message" => "id order message",
    "id_lang" => "id lang",
    "name" => "name",
    "message" => "message",
];


$n = 30;
$table->setTransformer('message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
