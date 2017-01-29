<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_cart_rule", ['id_order_cart_rule']);



$form->labels = [
    "id_order_cart_rule" => "id order cart rule",
    "id_order" => "id order",
    "id_cart_rule" => "id cart rule",
    "id_order_invoice" => "id order invoice",
    "name" => "name",
    "value" => "value",
    "value_tax_excl" => "value tax excl",
    "free_shipping" => "free shipping",
];


$form->title = "Ps order cart rule";


$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_order_invoice")->type("text")
->value("0");
$form->addControl("name")->type("text");
$form->addControl("value")->type("text")
->value("0.00");
$form->addControl("value_tax_excl")->type("text")
->value("0.00");
$form->addControl("free_shipping")->type("text")
->value("0");


$form->display();
