<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_range_price", ['id_range_price']);



$form->labels = [
    "id_range_price" => "id range price",
    "id_carrier" => "id carrier",
    "delimiter1" => "delimiter1",
    "delimiter2" => "delimiter2",
];


$form->title = "Ps range price";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("delimiter1")->type("text");
$form->addControl("delimiter2")->type("text");


$form->display();
