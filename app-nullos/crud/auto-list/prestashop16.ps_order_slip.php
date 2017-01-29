<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_slip,
conversion_rate,
id_customer,
id_order,
total_products_tax_excl,
total_products_tax_incl,
total_shipping_tax_excl,
total_shipping_tax_incl,
shipping_cost,
amount,
shipping_cost_amount,
partial,
order_slip_type,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_order_slip
";


$table = CrudModule::getDataTable("prestashop16.ps_order_slip", $query, $fields, ['id_order_slip']);

$table->title = "Ps order slip";


$table->columnLabels= [
    "id_order_slip" => "id order slip",
    "conversion_rate" => "conversion rate",
    "id_customer" => "id customer",
    "id_order" => "id order",
    "total_products_tax_excl" => "total products tax excl",
    "total_products_tax_incl" => "total products tax incl",
    "total_shipping_tax_excl" => "total shipping tax excl",
    "total_shipping_tax_incl" => "total shipping tax incl",
    "shipping_cost" => "shipping cost",
    "amount" => "amount",
    "shipping_cost_amount" => "shipping cost amount",
    "partial" => "partial",
    "order_slip_type" => "order slip type",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_order_slip",
];


$table->displayTable();
