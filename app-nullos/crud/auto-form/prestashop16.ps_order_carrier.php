<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_carrier", ['id_order_carrier']);



$form->labels = [
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


$form->title = "Ps order carrier";


$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_order_invoice")->type("text")
->value(0);
$form->addControl("weight")->type("text");
$form->addControl("shipping_cost_tax_excl")->type("text");
$form->addControl("shipping_cost_tax_incl")->type("text");
$form->addControl("tracking_number")->type("text");
$form->addControl("date_add")->type("date6");


$form->display();
