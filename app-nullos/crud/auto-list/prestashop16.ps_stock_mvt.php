<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_stock_mvt,
id_stock,
id_order,
id_supply_order,
id_stock_mvt_reason,
id_employee,
employee_lastname,
employee_firstname,
physical_quantity,
date_add,
sign,
price_te,
last_wa,
current_wa,
referer
';


$query = "select
%s
from prestashop16.ps_stock_mvt
";


$table = CrudModule::getDataTable("prestashop16.ps_stock_mvt", $query, $fields, ['id_stock_mvt']);

$table->title = "Ps stock mvt";


$table->columnLabels= [
    "id_stock_mvt" => "id stock mvt",
    "id_stock" => "id stock",
    "id_order" => "id order",
    "id_supply_order" => "id supply order",
    "id_stock_mvt_reason" => "id stock mvt reason",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "physical_quantity" => "physical quantity",
    "date_add" => "date add",
    "sign" => "sign",
    "price_te" => "price te",
    "last_wa" => "last wa",
    "current_wa" => "current wa",
    "referer" => "referer",
];


$table->hiddenColumns = [
    "id_stock_mvt",
];


$table->displayTable();
