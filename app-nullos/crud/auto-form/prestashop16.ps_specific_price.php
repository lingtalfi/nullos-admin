<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_specific_price", ['id_specific_price']);



$form->labels = [
    "id_specific_price" => "id specific price",
    "id_specific_price_rule" => "id specific price rule",
    "id_cart" => "id cart",
    "id_product" => "id product",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "id_currency" => "id currency",
    "id_country" => "id country",
    "id_group" => "id group",
    "id_customer" => "id customer",
    "id_product_attribute" => "id product attribute",
    "price" => "price",
    "from_quantity" => "from quantity",
    "reduction" => "reduction",
    "reduction_tax" => "reduction tax",
    "reduction_type" => "reduction type",
    "from" => "from",
    "to" => "to",
];


$form->title = "Ps specific price";


$form->addControl("id_specific_price_rule")->type("text")
->value(0);
$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_shop_group")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("price")->type("text");
$form->addControl("from_quantity")->type("text");
$form->addControl("reduction")->type("text");
$form->addControl("reduction_tax")->type("text")
->value("1");
$form->addControl("reduction_type")->type("radioList", ['amount','percentage']);
$form->addControl("from")->type("date6");
$form->addControl("to")->type("date6");


$form->display();
