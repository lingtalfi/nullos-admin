<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier_lang", ['id_lang', 'id_shop', 'id_carrier']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "delay" => "delay",
];


$form->title = "Ps carrier lang";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("delay")->type("text");


$form->display();
