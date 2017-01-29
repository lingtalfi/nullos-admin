<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_carrier,
id_order,
id_carrier,
id_order_invoice,
weight,
shipping_cost_tax_excl,
shipping_cost_tax_incl,
tracking_number,
date_add
';


$query = "select
%s
from prestashop16.ps_order_carrier
";


$table = CrudModule::getDataTable("prestashop16.ps_order_carrier", $query, $fields, ['id_order_carrier']);

$table->title = "Ps order carrier";


$table->columnLabels= [
    "id_order_carrier" => "id order carrier",
    "id_order" => "id order",
    "id_carrier" => "id carrier",
    "id_order_invoice" => "id order invoice",
    "weight" => "weight",
    "shipping_cost_tax_excl" => "shipping cost tax excl",
    "shipping_cost_tax_incl" => "shipping cost tax incl",
    "tracking_number" => "tracking number",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_order_carrier",
];


$table->displayTable();
