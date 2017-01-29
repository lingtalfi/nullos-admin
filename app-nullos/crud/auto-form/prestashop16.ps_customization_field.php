<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customization_field", ['id_customization_field']);



$form->labels = [
    "id_customization_field" => "id customization field",
    "id_product" => "id product",
    "type" => "type",
    "required" => "required",
];


$form->title = "Ps customization field";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("type")->type("text")
->value(0);
$form->addControl("required")->type("text")
->value(0);


$form->display();
