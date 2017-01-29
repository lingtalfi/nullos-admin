<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_pack", ['id_product_pack', 'id_product_item', 'id_product_attribute_item']);



$form->labels = [
    "id_product_pack" => "id product pack",
    "id_product_item" => "id product item",
    "id_product_attribute_item" => "id product attribute item",
    "quantity" => "quantity",
];


$form->title = "Ps pack";


$form->addControl("id_product_pack")->type("text")
->value(0);
$form->addControl("id_product_item")->type("text")
->value(0);
$form->addControl("id_product_attribute_item")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value("1");


$form->display();
