<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_cart_rule,
id_order,
id_cart_rule,
id_order_invoice,
name,
value,
value_tax_excl,
free_shipping
';


$query = "select
%s
from prestashop16.ps_order_cart_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_order_cart_rule", $query, $fields, ['id_order_cart_rule']);

$table->title = "Ps order cart rule";


$table->columnLabels= [
    "id_order_cart_rule" => "id order cart rule",
    "id_order" => "id order",
    "id_cart_rule" => "id cart rule",
    "id_order_invoice" => "id order invoice",
    "name" => "name",
    "value" => "value",
    "value_tax_excl" => "value tax excl",
    "free_shipping" => "free shipping",
];


$table->hiddenColumns = [
    "id_order_cart_rule",
];


$table->displayTable();
