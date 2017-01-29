<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_history,
id_employee,
id_order,
id_order_state,
date_add
';


$query = "select
%s
from prestashop16.ps_order_history
";


$table = CrudModule::getDataTable("prestashop16.ps_order_history", $query, $fields, ['id_order_history']);

$table->title = "Ps order history";


$table->columnLabels= [
    "id_order_history" => "id order history",
    "id_employee" => "id employee",
    "id_order" => "id order",
    "id_order_state" => "id order state",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_order_history",
];


$table->displayTable();
