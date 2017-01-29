<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_customer,
date_from,
date_to,
description,
quantity,
quantity_per_user,
priority,
partial_use,
code,
minimum_amount,
minimum_amount_tax,
minimum_amount_currency,
minimum_amount_shipping,
country_restriction,
carrier_restriction,
group_restriction,
cart_rule_restriction,
product_restriction,
shop_restriction,
free_shipping,
reduction_percent,
reduction_amount,
reduction_tax,
reduction_currency,
reduction_product,
gift_product,
gift_product_attribute,
highlight,
active,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_cart_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule", $query, $fields, ['id_cart_rule']);

$table->title = "Ps cart rule";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_customer" => "id customer",
    "date_from" => "date from",
    "date_to" => "date to",
    "description" => "description",
    "quantity" => "quantity",
    "quantity_per_user" => "quantity per user",
    "priority" => "priority",
    "partial_use" => "partial use",
    "code" => "code",
    "minimum_amount" => "minimum amount",
    "minimum_amount_tax" => "minimum amount tax",
    "minimum_amount_currency" => "minimum amount currency",
    "minimum_amount_shipping" => "minimum amount shipping",
    "country_restriction" => "country restriction",
    "carrier_restriction" => "carrier restriction",
    "group_restriction" => "group restriction",
    "cart_rule_restriction" => "cart rule restriction",
    "product_restriction" => "product restriction",
    "shop_restriction" => "shop restriction",
    "free_shipping" => "free shipping",
    "reduction_percent" => "reduction percent",
    "reduction_amount" => "reduction amount",
    "reduction_tax" => "reduction tax",
    "reduction_currency" => "reduction currency",
    "reduction_product" => "reduction product",
    "gift_product" => "gift product",
    "gift_product_attribute" => "gift product attribute",
    "highlight" => "highlight",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_cart_rule",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
