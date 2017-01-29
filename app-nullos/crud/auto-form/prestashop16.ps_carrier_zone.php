<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier_zone", ['id_carrier', 'id_zone']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_zone" => "id zone",
];


$form->title = "Ps carrier zone";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_zone")->type("text")
->value(0);


$form->display();
