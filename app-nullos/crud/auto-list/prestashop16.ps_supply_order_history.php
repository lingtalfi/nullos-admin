<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order_history,
id_supply_order,
id_employee,
employee_lastname,
employee_firstname,
id_state,
date_add
';


$query = "select
%s
from prestashop16.ps_supply_order_history
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order_history", $query, $fields, ['id_supply_order_history']);

$table->title = "Ps supply order history";


$table->columnLabels= [
    "id_supply_order_history" => "id supply order history",
    "id_supply_order" => "id supply order",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "id_state" => "id state",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_supply_order_history",
];


$table->displayTable();
