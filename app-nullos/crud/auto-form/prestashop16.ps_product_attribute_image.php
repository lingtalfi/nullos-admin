<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_attribute_image", ['id_product_attribute', 'id_image']);



$form->labels = [
    "id_product_attribute" => "id product attribute",
    "id_image" => "id image",
];


$form->title = "Ps product attribute image";


$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("id_image")->type("text")
->value(0);


$form->display();
