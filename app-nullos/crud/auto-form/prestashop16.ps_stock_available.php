<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_stock_available", ['id_stock_available']);



$form->labels = [
    "id_stock_available" => "id stock available",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "quantity" => "quantity",
    "depends_on_stock" => "depends on stock",
    "out_of_stock" => "out of stock",
];


$form->title = "Ps stock available";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_shop_group")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value("0");
$form->addControl("depends_on_stock")->type("text")
->value("0");
$form->addControl("out_of_stock")->type("text")
->value("0");


$form->display();
