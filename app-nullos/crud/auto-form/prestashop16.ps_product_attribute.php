<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_attribute", ['id_product_attribute']);



$form->labels = [
    "id_product_attribute" => "id product attribute",
    "id_product" => "id product",
    "reference" => "reference",
    "supplier_reference" => "supplier reference",
    "location" => "location",
    "ean13" => "ean13",
    "upc" => "upc",
    "wholesale_price" => "wholesale price",
    "price" => "price",
    "ecotax" => "ecotax",
    "quantity" => "quantity",
    "weight" => "weight",
    "unit_price_impact" => "unit price impact",
    "default_on" => "default on",
    "minimal_quantity" => "minimal quantity",
    "available_date" => "available date",
];


$form->title = "Ps product attribute";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("reference")->type("text");
$form->addControl("supplier_reference")->type("text");
$form->addControl("location")->type("text");
$form->addControl("ean13")->type("text");
$form->addControl("upc")->type("text");
$form->addControl("wholesale_price")->type("text")
->value("0.000000");
$form->addControl("price")->type("text")
->value("0.000000");
$form->addControl("ecotax")->type("text")
->value("0.000000");
$form->addControl("quantity")->type("text")
->value("0");
$form->addControl("weight")->type("text")
->value("0.000000");
$form->addControl("unit_price_impact")->type("text")
->value("0.000000");
$form->addControl("default_on")->type("text")
->value(0);
$form->addControl("minimal_quantity")->type("text")
->value("1");
$form->addControl("available_date")->type("date3")
->value("0000-00-00");


$form->display();
