<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_invoice,
id_order,
number,
delivery_number,
delivery_date,
total_discount_tax_excl,
total_discount_tax_incl,
total_paid_tax_excl,
total_paid_tax_incl,
total_products,
total_products_wt,
total_shipping_tax_excl,
total_shipping_tax_incl,
shipping_tax_computation_method,
total_wrapping_tax_excl,
total_wrapping_tax_incl,
shop_address,
invoice_address,
delivery_address,
note,
date_add
';


$query = "select
%s
from prestashop16.ps_order_invoice
";


$table = CrudModule::getDataTable("prestashop16.ps_order_invoice", $query, $fields, ['id_order_invoice']);

$table->title = "Ps order invoice";


$table->columnLabels= [
    "id_order_invoice" => "id order invoice",
    "id_order" => "id order",
    "number" => "number",
    "delivery_number" => "delivery number",
    "delivery_date" => "delivery date",
    "total_discount_tax_excl" => "total discount tax excl",
    "total_discount_tax_incl" => "total discount tax incl",
    "total_paid_tax_excl" => "total paid tax excl",
    "total_paid_tax_incl" => "total paid tax incl",
    "total_products" => "total products",
    "total_products_wt" => "total products wt",
    "total_shipping_tax_excl" => "total shipping tax excl",
    "total_shipping_tax_incl" => "total shipping tax incl",
    "shipping_tax_computation_method" => "shipping tax computation method",
    "total_wrapping_tax_excl" => "total wrapping tax excl",
    "total_wrapping_tax_incl" => "total wrapping tax incl",
    "shop_address" => "shop address",
    "invoice_address" => "invoice address",
    "delivery_address" => "delivery address",
    "note" => "note",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_order_invoice",
];


$n = 30;
$table->setTransformer('shop_address', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('invoice_address', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('delivery_address', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('note', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
