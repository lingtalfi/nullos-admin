<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_gender", ['id_gender']);



$form->labels = [
    "id_gender" => "id gender",
    "type" => "type",
];


$form->title = "Ps gender";


$form->addControl("type")->type("text")
->value(0);


$form->display();
