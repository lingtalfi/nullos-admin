<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customization", ['id_customization', 'id_cart', 'id_product', 'id_address_delivery']);



$form->labels = [
    "id_customization" => "id customization",
    "id_product_attribute" => "id product attribute",
    "id_address_delivery" => "id address delivery",
    "id_cart" => "id cart",
    "id_product" => "id product",
    "quantity" => "quantity",
    "quantity_refunded" => "quantity refunded",
    "quantity_returned" => "quantity returned",
    "in_cart" => "in cart",
];


$form->title = "Ps customization";


$form->addControl("id_product_attribute")->type("text")
->value("0");
$form->addControl("id_address_delivery")->type("text")
->value("0");
$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value(0);
$form->addControl("quantity_refunded")->type("text")
->value("0");
$form->addControl("quantity_returned")->type("text")
->value("0");
$form->addControl("in_cart")->type("text")
->value("0");


$form->display();
