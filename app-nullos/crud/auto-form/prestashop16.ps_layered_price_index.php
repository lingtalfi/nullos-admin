<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_price_index", ['id_product', 'id_currency', 'id_shop']);



$form->labels = [
    "id_product" => "id product",
    "id_currency" => "id currency",
    "id_shop" => "id shop",
    "price_min" => "price min",
    "price_max" => "price max",
];


$form->title = "Ps layered price index";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("price_min")->type("text")
->value(0);
$form->addControl("price_max")->type("text")
->value(0);


$form->display();
