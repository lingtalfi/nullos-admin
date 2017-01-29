<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_orders", ['id_order']);



$form->labels = [
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


$form->title = "Ps orders";


$form->addControl("reference")->type("text");
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_address_delivery")->type("text")
->value(0);
$form->addControl("id_address_invoice")->type("text")
->value(0);
$form->addControl("current_state")->type("text")
->value(0);
$form->addControl("secure_key")->type("text")
->value("-1");
$form->addControl("payment")->type("text");
$form->addControl("conversion_rate")->type("text")
->value("1.000000");
$form->addControl("module")->type("text");
$form->addControl("recyclable")->type("text")
->value("0");
$form->addControl("gift")->type("text")
->value("0");
$form->addControl("gift_message")->type("message");
$form->addControl("mobile_theme")->type("text")
->value("0");
$form->addControl("shipping_number")->type("text");
$form->addControl("total_discounts")->type("text")
->value("0.000000");
$form->addControl("total_discounts_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_discounts_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_paid")->type("text")
->value("0.000000");
$form->addControl("total_paid_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_paid_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_paid_real")->type("text")
->value("0.000000");
$form->addControl("total_products")->type("text")
->value("0.000000");
$form->addControl("total_products_wt")->type("text")
->value("0.000000");
$form->addControl("total_shipping")->type("text")
->value("0.000000");
$form->addControl("total_shipping_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_shipping_tax_excl")->type("text")
->value("0.000000");
$form->addControl("carrier_tax_rate")->type("text")
->value("0.000");
$form->addControl("total_wrapping")->type("text")
->value("0.000000");
$form->addControl("total_wrapping_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_wrapping_tax_excl")->type("text")
->value("0.000000");
$form->addControl("round_mode")->type("text")
->value("2");
$form->addControl("round_type")->type("text")
->value("1");
$form->addControl("invoice_number")->type("text")
->value("0");
$form->addControl("delivery_number")->type("text")
->value("0");
$form->addControl("invoice_date")->type("date6");
$form->addControl("delivery_date")->type("date6");
$form->addControl("valid")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
