<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule", ['id_cart_rule']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_customer" => "id customer",
    "date_from" => "date from",
    "date_to" => "date to",
    "description" => "description",
    "quantity" => "quantity",
    "quantity_per_user" => "quantity per user",
    "priority" => "priority",
    "partial_use" => "partial use",
    "code" => "code",
    "minimum_amount" => "minimum amount",
    "minimum_amount_tax" => "minimum amount tax",
    "minimum_amount_currency" => "minimum amount currency",
    "minimum_amount_shipping" => "minimum amount shipping",
    "country_restriction" => "country restriction",
    "carrier_restriction" => "carrier restriction",
    "group_restriction" => "group restriction",
    "cart_rule_restriction" => "cart rule restriction",
    "product_restriction" => "product restriction",
    "shop_restriction" => "shop restriction",
    "free_shipping" => "free shipping",
    "reduction_percent" => "reduction percent",
    "reduction_amount" => "reduction amount",
    "reduction_tax" => "reduction tax",
    "reduction_currency" => "reduction currency",
    "reduction_product" => "reduction product",
    "gift_product" => "gift product",
    "gift_product_attribute" => "gift product attribute",
    "highlight" => "highlight",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps cart rule";


$form->addControl("id_customer")->type("text")
->value("0");
$form->addControl("date_from")->type("date6");
$form->addControl("date_to")->type("date6");
$form->addControl("description")->type("message");
$form->addControl("quantity")->type("text")
->value("0");
$form->addControl("quantity_per_user")->type("text")
->value("0");
$form->addControl("priority")->type("text")
->value("1");
$form->addControl("partial_use")->type("text")
->value("0");
$form->addControl("code")->type("text");
$form->addControl("minimum_amount")->type("text")
->value("0.00");
$form->addControl("minimum_amount_tax")->type("text")
->value("0");
$form->addControl("minimum_amount_currency")->type("text")
->value("0");
$form->addControl("minimum_amount_shipping")->type("text")
->value("0");
$form->addControl("country_restriction")->type("text")
->value("0");
$form->addControl("carrier_restriction")->type("text")
->value("0");
$form->addControl("group_restriction")->type("text")
->value("0");
$form->addControl("cart_rule_restriction")->type("text")
->value("0");
$form->addControl("product_restriction")->type("text")
->value("0");
$form->addControl("shop_restriction")->type("text")
->value("0");
$form->addControl("free_shipping")->type("text")
->value("0");
$form->addControl("reduction_percent")->type("text")
->value("0.00");
$form->addControl("reduction_amount")->type("text")
->value("0.00");
$form->addControl("reduction_tax")->type("text")
->value("0");
$form->addControl("reduction_currency")->type("text")
->value("0");
$form->addControl("reduction_product")->type("text")
->value("0");
$form->addControl("gift_product")->type("text")
->value("0");
$form->addControl("gift_product_attribute")->type("text")
->value("0");
$form->addControl("highlight")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
