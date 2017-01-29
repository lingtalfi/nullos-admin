<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_return_state,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_order_return_state_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_order_return_state_lang", $query, $fields, ['id_order_return_state', 'id_lang']);

$table->title = "Ps order return state lang";


$table->columnLabels= [
    "id_order_return_state" => "id order return state",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();
