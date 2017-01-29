<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_slip_detail", ['id_order_slip', 'id_order_detail']);



$form->labels = [
    "id_order_slip" => "id order slip",
    "id_order_detail" => "id order detail",
    "product_quantity" => "product quantity",
    "unit_price_tax_excl" => "unit price tax excl",
    "unit_price_tax_incl" => "unit price tax incl",
    "total_price_tax_excl" => "total price tax excl",
    "total_price_tax_incl" => "total price tax incl",
    "amount_tax_excl" => "amount tax excl",
    "amount_tax_incl" => "amount tax incl",
];


$form->title = "Ps order slip detail";


$form->addControl("id_order_slip")->type("text")
->value(0);
$form->addControl("id_order_detail")->type("text")
->value(0);
$form->addControl("product_quantity")->type("text")
->value("0");
$form->addControl("unit_price_tax_excl")->type("text");
$form->addControl("unit_price_tax_incl")->type("text");
$form->addControl("total_price_tax_excl")->type("text");
$form->addControl("total_price_tax_incl")->type("text");
$form->addControl("amount_tax_excl")->type("text");
$form->addControl("amount_tax_incl")->type("text");


$form->display();
