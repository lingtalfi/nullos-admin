<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer_message", ['id_customer_message']);



$form->labels = [
    "id_customer_message" => "id customer message",
    "id_customer_thread" => "id customer thread",
    "id_employee" => "id employee",
    "message" => "message",
    "file_name" => "file name",
    "ip_address" => "ip address",
    "user_agent" => "user agent",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "private" => "private",
    "read" => "read",
];


$form->title = "Ps customer message";


$form->addControl("id_customer_thread")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("message")->type("text");
$form->addControl("file_name")->type("text");
$form->addControl("ip_address")->type("text");
$form->addControl("user_agent")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("private")->type("text")
->value("0");
$form->addControl("read")->type("text")
->value("0");


$form->display();
