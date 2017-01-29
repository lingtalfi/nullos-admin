<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order_receipt_history,
id_supply_order_detail,
id_employee,
employee_lastname,
employee_firstname,
id_supply_order_state,
quantity,
date_add
';


$query = "select
%s
from prestashop16.ps_supply_order_receipt_history
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order_receipt_history", $query, $fields, ['id_supply_order_receipt_history']);

$table->title = "Ps supply order receipt history";


$table->columnLabels= [
    "id_supply_order_receipt_history" => "id supply order receipt history",
    "id_supply_order_detail" => "id supply order detail",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "id_supply_order_state" => "id supply order state",
    "quantity" => "quantity",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_supply_order_receipt_history",
];


$table->displayTable();
