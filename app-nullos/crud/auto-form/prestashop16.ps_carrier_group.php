<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier_group", ['id_carrier', 'id_group']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_group" => "id group",
];


$form->title = "Ps carrier group";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);


$form->display();
