<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_message,
date_add
';


$query = "select
%s
from prestashop16.ps_order_message
";


$table = CrudModule::getDataTable("prestashop16.ps_order_message", $query, $fields, ['id_order_message']);

$table->title = "Ps order message";


$table->columnLabels= [
    "id_order_message" => "id order message",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_order_message",
];


$table->displayTable();
