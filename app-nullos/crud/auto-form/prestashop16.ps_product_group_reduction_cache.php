<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_group_reduction_cache", ['id_product', 'id_group']);



$form->labels = [
    "id_product" => "id product",
    "id_group" => "id group",
    "reduction" => "reduction",
];


$form->title = "Ps product group reduction cache";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("reduction")->type("text");


$form->display();
