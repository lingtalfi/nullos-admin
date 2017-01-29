<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_currency_shop", ['id_currency', 'id_shop']);



$form->labels = [
    "id_currency" => "id currency",
    "id_shop" => "id shop",
    "conversion_rate" => "conversion rate",
];


$form->title = "Ps currency shop";


$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("conversion_rate")->type("text");


$form->display();
