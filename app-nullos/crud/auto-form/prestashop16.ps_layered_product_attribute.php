<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_product_attribute", ['id_attribute', 'id_product', 'id_shop']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_product" => "id product",
    "id_attribute_group" => "id attribute group",
    "id_shop" => "id shop",
];


$form->title = "Ps layered product attribute";


$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_attribute_group")->type("text")
->value("0");
$form->addControl("id_shop")->type("text")
->value("1");


$form->display();
