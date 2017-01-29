<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_message,
id_employee,
date_add
';


$query = "select
%s
from prestashop16.ps_message_readed
";


$table = CrudModule::getDataTable("prestashop16.ps_message_readed", $query, $fields, ['id_message', 'id_employee']);

$table->title = "Ps message readed";


$table->columnLabels= [
    "id_message" => "id message",
    "id_employee" => "id employee",
    "date_add" => "date add",
];


$table->displayTable();
