<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_impact", ['id_attribute_impact']);



$form->labels = [
    "id_attribute_impact" => "id attribute impact",
    "id_product" => "id product",
    "id_attribute" => "id attribute",
    "weight" => "weight",
    "price" => "price",
];


$form->title = "Ps attribute impact";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("weight")->type("text");
$form->addControl("price")->type("text");


$form->display();
