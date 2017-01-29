<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_attribute_shop", ['id_product_attribute', 'id_shop']);



$form->labels = [
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_shop" => "id shop",
    "wholesale_price" => "wholesale price",
    "price" => "price",
    "ecotax" => "ecotax",
    "weight" => "weight",
    "unit_price_impact" => "unit price impact",
    "default_on" => "default on",
    "minimal_quantity" => "minimal quantity",
    "available_date" => "available date",
];


$form->title = "Ps product attribute shop";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("wholesale_price")->type("text")
->value("0.000000");
$form->addControl("price")->type("text")
->value("0.000000");
$form->addControl("ecotax")->type("text")
->value("0.000000");
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
