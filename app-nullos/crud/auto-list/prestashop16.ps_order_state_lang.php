<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_state,
id_lang,
name,
template
';


$query = "select
%s
from prestashop16.ps_order_state_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_order_state_lang", $query, $fields, ['id_order_state', 'id_lang']);

$table->title = "Ps order state lang";


$table->columnLabels= [
    "id_order_state" => "id order state",
    "id_lang" => "id lang",
    "name" => "name",
    "template" => "template",
];


$table->displayTable();
