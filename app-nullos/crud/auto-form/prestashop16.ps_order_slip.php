<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_slip", ['id_order_slip']);



$form->labels = [
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


$form->title = "Ps order slip";


$form->addControl("conversion_rate")->type("text")
->value("1.000000");
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("total_products_tax_excl")->type("text");
$form->addControl("total_products_tax_incl")->type("text");
$form->addControl("total_shipping_tax_excl")->type("text");
$form->addControl("total_shipping_tax_incl")->type("text");
$form->addControl("shipping_cost")->type("text")
->value("0");
$form->addControl("amount")->type("text");
$form->addControl("shipping_cost_amount")->type("text");
$form->addControl("partial")->type("text")
->value(0);
$form->addControl("order_slip_type")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
