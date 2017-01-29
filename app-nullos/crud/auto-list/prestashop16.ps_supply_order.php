<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order,
id_supplier,
supplier_name,
id_lang,
id_warehouse,
id_supply_order_state,
id_currency,
id_ref_currency,
reference,
date_add,
date_upd,
date_delivery_expected,
total_te,
total_with_discount_te,
total_tax,
total_ti,
discount_rate,
discount_value_te,
is_template
';


$query = "select
%s
from prestashop16.ps_supply_order
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order", $query, $fields, ['id_supply_order']);

$table->title = "Ps supply order";


$table->columnLabels= [
    "id_supply_order" => "id supply order",
    "id_supplier" => "id supplier",
    "supplier_name" => "supplier name",
    "id_lang" => "id lang",
    "id_warehouse" => "id warehouse",
    "id_supply_order_state" => "id supply order state",
    "id_currency" => "id currency",
    "id_ref_currency" => "id ref currency",
    "reference" => "reference",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "date_delivery_expected" => "date delivery expected",
    "total_te" => "total te",
    "total_with_discount_te" => "total with discount te",
    "total_tax" => "total tax",
    "total_ti" => "total ti",
    "discount_rate" => "discount rate",
    "discount_value_te" => "discount value te",
    "is_template" => "is template",
];


$table->hiddenColumns = [
    "id_supply_order",
];


$table->displayTable();
