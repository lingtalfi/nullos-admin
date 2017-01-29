<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order,
reference,
id_shop_group,
id_shop,
id_carrier,
id_lang,
id_customer,
id_cart,
id_currency,
id_address_delivery,
id_address_invoice,
current_state,
secure_key,
payment,
conversion_rate,
module,
recyclable,
gift,
gift_message,
mobile_theme,
shipping_number,
total_discounts,
total_discounts_tax_incl,
total_discounts_tax_excl,
total_paid,
total_paid_tax_incl,
total_paid_tax_excl,
total_paid_real,
total_products,
total_products_wt,
total_shipping,
total_shipping_tax_incl,
total_shipping_tax_excl,
carrier_tax_rate,
total_wrapping,
total_wrapping_tax_incl,
total_wrapping_tax_excl,
round_mode,
round_type,
invoice_number,
delivery_number,
invoice_date,
delivery_date,
valid,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_orders
";


$table = CrudModule::getDataTable("prestashop16.ps_orders", $query, $fields, ['id_order']);

$table->title = "Ps orders";


$table->columnLabels= [
    "id_order" => "id order",
    "reference" => "reference",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_carrier" => "id carrier",
    "id_lang" => "id lang",
    "id_customer" => "id customer",
    "id_cart" => "id cart",
    "id_currency" => "id currency",
    "id_address_delivery" => "id address delivery",
    "id_address_invoice" => "id address invoice",
    "current_state" => "current state",
    "secure_key" => "secure key",
    "payment" => "payment",
    "conversion_rate" => "conversion rate",
    "module" => "module",
    "recyclable" => "recyclable",
    "gift" => "gift",
    "gift_message" => "gift message",
    "mobile_theme" => "mobile theme",
    "shipping_number" => "shipping number",
    "total_discounts" => "total discounts",
    "total_discounts_tax_incl" => "total discounts tax incl",
    "total_discounts_tax_excl" => "total discounts tax excl",
    "total_paid" => "total paid",
    "total_paid_tax_incl" => "total paid tax incl",
    "total_paid_tax_excl" => "total paid tax excl",
    "total_paid_real" => "total paid real",
    "total_products" => "total products",
    "total_products_wt" => "total products wt",
    "total_shipping" => "total shipping",
    "total_shipping_tax_incl" => "total shipping tax incl",
    "total_shipping_tax_excl" => "total shipping tax excl",
    "carrier_tax_rate" => "carrier tax rate",
    "total_wrapping" => "total wrapping",
    "total_wrapping_tax_incl" => "total wrapping tax incl",
    "total_wrapping_tax_excl" => "total wrapping tax excl",
    "round_mode" => "round mode",
    "round_type" => "round type",
    "invoice_number" => "invoice number",
    "delivery_number" => "delivery number",
    "invoice_date" => "invoice date",
    "delivery_date" => "delivery date",
    "valid" => "valid",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_order",
];


$n = 30;
$table->setTransformer('gift_message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
