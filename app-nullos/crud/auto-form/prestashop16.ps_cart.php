<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart", ['id_cart']);



$form->labels = [
    "id_cart" => "id cart",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_carrier" => "id carrier",
    "delivery_option" => "delivery option",
    "id_lang" => "id lang",
    "id_address_delivery" => "id address delivery",
    "id_address_invoice" => "id address invoice",
    "id_currency" => "id currency",
    "id_customer" => "id customer",
    "id_guest" => "id guest",
    "secure_key" => "secure key",
    "recyclable" => "recyclable",
    "gift" => "gift",
    "gift_message" => "gift message",
    "mobile_theme" => "mobile theme",
    "allow_seperated_package" => "allow seperated package",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps cart";


$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("delivery_option")->type("message");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_address_delivery")->type("text")
->value(0);
$form->addControl("id_address_invoice")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_guest")->type("text")
->value(0);
$form->addControl("secure_key")->type("text")
->value("-1");
$form->addControl("recyclable")->type("text")
->value("1");
$form->addControl("gift")->type("text")
->value("0");
$form->addControl("gift_message")->type("message");
$form->addControl("mobile_theme")->type("text")
->value("0");
$form->addControl("allow_seperated_package")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
