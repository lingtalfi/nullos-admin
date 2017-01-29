<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_warehouse_carrier", ['id_warehouse', 'id_carrier']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_warehouse" => "id warehouse",
];


$form->title = "Ps warehouse carrier";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_warehouse")->type("text")
->value(0);


$form->display();
