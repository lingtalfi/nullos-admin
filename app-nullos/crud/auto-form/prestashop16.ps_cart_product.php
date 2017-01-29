<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_product", ['id_cart', 'id_product', 'id_product_attribute', 'id_address_delivery']);



$form->labels = [
    "id_cart" => "id cart",
    "id_product" => "id product",
    "id_address_delivery" => "id address delivery",
    "id_shop" => "id shop",
    "id_product_attribute" => "id product attribute",
    "quantity" => "quantity",
    "date_add" => "date add",
];


$form->title = "Ps cart product";


$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_address_delivery")->type("text")
->value("0");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_product_attribute")->type("text")
->value("0");
$form->addControl("quantity")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");


$form->display();
