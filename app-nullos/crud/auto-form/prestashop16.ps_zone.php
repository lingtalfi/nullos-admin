<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_zone", ['id_zone']);



$form->labels = [
    "id_zone" => "id zone",
    "name" => "name",
    "active" => "active",
];


$form->title = "Ps zone";


$form->addControl("name")->type("text");
$form->addControl("active")->type("text")
->value("0");


$form->display();
