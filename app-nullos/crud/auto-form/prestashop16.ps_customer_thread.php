<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer_thread", ['id_customer_thread']);



$form->labels = [
    "id_customer_thread" => "id customer thread",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "id_contact" => "id contact",
    "id_customer" => "id customer",
    "id_order" => "id order",
    "id_product" => "id product",
    "status" => "status",
    "email" => "email",
    "token" => "token",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps customer thread";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_contact")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("status")->type("select", ['open','closed','pending1','pending2'])
->value("open");
$form->addControl("email")->type("text");
$form->addControl("token")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
