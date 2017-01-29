<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customized_data", ['id_customization', 'type', 'index']);



$form->labels = [
    "id_customization" => "id customization",
    "type" => "type",
    "index" => "index",
    "value" => "value",
];


$form->title = "Ps customized data";


$form->addControl("id_customization")->type("text")
->value(0);
$form->addControl("type")->type("text")
->value(0);
$form->addControl("index")->type("text")
->value(0);
$form->addControl("value")->type("text");


$form->display();
