<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order_state,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_supply_order_state_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order_state_lang", $query, $fields, ['id_supply_order_state', 'id_lang']);

$table->title = "Ps supply order state lang";


$table->columnLabels= [
    "id_supply_order_state" => "id supply order state",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();
