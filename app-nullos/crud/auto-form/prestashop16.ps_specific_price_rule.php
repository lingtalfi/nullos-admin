<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_specific_price_rule", ['id_specific_price_rule']);



$form->labels = [
    "id_specific_price_rule" => "id specific price rule",
    "name" => "name",
    "id_shop" => "id shop",
    "id_currency" => "id currency",
    "id_country" => "id country",
    "id_group" => "id group",
    "from_quantity" => "from quantity",
    "price" => "price",
    "reduction" => "reduction",
    "reduction_tax" => "reduction tax",
    "reduction_type" => "reduction type",
    "from" => "from",
    "to" => "to",
];


$form->title = "Ps specific price rule";


$form->addControl("name")->type("text");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("from_quantity")->type("text");
$form->addControl("price")->type("text");
$form->addControl("reduction")->type("text");
$form->addControl("reduction_tax")->type("text")
->value("1");
$form->addControl("reduction_type")->type("radioList", ['amount','percentage']);
$form->addControl("from")->type("date6");
$form->addControl("to")->type("date6");


$form->display();
