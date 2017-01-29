<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_operating_system", ['id_operating_system']);



$form->labels = [
    "id_operating_system" => "id operating system",
    "name" => "name",
];


$form->title = "Ps operating system";


$form->addControl("name")->type("text");


$form->display();
