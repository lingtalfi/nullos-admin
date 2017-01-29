<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_attribute_combination", ['id_attribute', 'id_product_attribute']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_product_attribute" => "id product attribute",
];


$form->title = "Ps product attribute combination";


$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);


$form->display();
