<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_delivery", ['id_delivery']);



$form->labels = [
    "id_delivery" => "id delivery",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "id_carrier" => "id carrier",
    "id_range_price" => "id range price",
    "id_range_weight" => "id range weight",
    "id_zone" => "id zone",
    "price" => "price",
];


$form->title = "Ps delivery";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_shop_group")->type("text")
->value(0);
$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_range_price")->type("text")
->value(0);
$form->addControl("id_range_weight")->type("text")
->value(0);
$form->addControl("id_zone")->type("text")
->value(0);
$form->addControl("price")->type("text");


$form->display();
