<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_stock", ['id_stock']);



$form->labels = [
    "id_stock" => "id stock",
    "id_warehouse" => "id warehouse",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "reference" => "reference",
    "ean13" => "ean13",
    "upc" => "upc",
    "physical_quantity" => "physical quantity",
    "usable_quantity" => "usable quantity",
    "price_te" => "price te",
];


$form->title = "Ps stock";


$form->addControl("id_warehouse")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("reference")->type("text");
$form->addControl("ean13")->type("text");
$form->addControl("upc")->type("text");
$form->addControl("physical_quantity")->type("text")
->value(0);
$form->addControl("usable_quantity")->type("text")
->value(0);
$form->addControl("price_te")->type("text")
->value("0.000000");


$form->display();
