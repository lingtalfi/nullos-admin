<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_risk", ['id_risk']);



$form->labels = [
    "id_risk" => "id risk",
    "percent" => "percent",
    "color" => "color",
];


$form->title = "Ps risk";


$form->addControl("percent")->type("text")
->value(0);
$form->addControl("color")->type("text");


$form->display();
