<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_warehouse_product_location", ['id_warehouse_product_location']);



$form->labels = [
    "id_warehouse_product_location" => "id warehouse product location",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_warehouse" => "id warehouse",
    "location" => "location",
];


$form->title = "Ps warehouse product location";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("id_warehouse")->type("text")
->value(0);
$form->addControl("location")->type("text");


$form->display();
