<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_required_field", ['id_required_field']);



$form->labels = [
    "id_required_field" => "id required field",
    "object_name" => "object name",
    "field_name" => "field name",
];


$form->title = "Ps required field";


$form->addControl("object_name")->type("text");
$form->addControl("field_name")->type("text");


$form->display();
