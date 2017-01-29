<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_invoice", ['id_order_invoice']);



$form->labels = [
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


$form->title = "Ps order invoice";


$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("number")->type("text")
->value(0);
$form->addControl("delivery_number")->type("text")
->value(0);
$form->addControl("delivery_date")->type("date6");
$form->addControl("total_discount_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_discount_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_paid_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_paid_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_products")->type("text")
->value("0.000000");
$form->addControl("total_products_wt")->type("text")
->value("0.000000");
$form->addControl("total_shipping_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_shipping_tax_incl")->type("text")
->value("0.000000");
$form->addControl("shipping_tax_computation_method")->type("text")
->value(0);
$form->addControl("total_wrapping_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_wrapping_tax_incl")->type("text")
->value("0.000000");
$form->addControl("shop_address")->type("message");
$form->addControl("invoice_address")->type("message");
$form->addControl("delivery_address")->type("message");
$form->addControl("note")->type("message");
$form->addControl("date_add")->type("date6");


$form->display();
