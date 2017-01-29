<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_accessory", ['id_product_1', 'id_product_2']);



$form->labels = [
    "id_product_1" => "id product 1",
    "id_product_2" => "id product 2",
];


$form->title = "Ps accessory";


$form->addControl("id_product_1")->type("text")
->value(0);
$form->addControl("id_product_2")->type("text")
->value(0);


$form->display();
