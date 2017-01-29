<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_message", ['id_message']);



$form->labels = [
    "id_message" => "id message",
    "id_cart" => "id cart",
    "id_customer" => "id customer",
    "id_employee" => "id employee",
    "id_order" => "id order",
    "message" => "message",
    "private" => "private",
    "date_add" => "date add",
];


$form->title = "Ps message";


$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("message")->type("message");
$form->addControl("private")->type("text")
->value("1");
$form->addControl("date_add")->type("date6");


$form->display();
