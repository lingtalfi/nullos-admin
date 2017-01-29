<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_return", ['id_order_return']);



$form->labels = [
    "id_order_return" => "id order return",
    "id_customer" => "id customer",
    "id_order" => "id order",
    "state" => "state",
    "question" => "question",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps order return";


$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("state")->type("text")
->value("1");
$form->addControl("question")->type("message");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
