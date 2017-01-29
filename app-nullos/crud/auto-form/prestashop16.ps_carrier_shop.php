<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier_shop", ['id_carrier', 'id_shop']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_shop" => "id shop",
];


$form->title = "Ps carrier shop";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
