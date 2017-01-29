<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_log", ['id_log']);



$form->labels = [
    "id_log" => "id log",
    "severity" => "severity",
    "error_code" => "error code",
    "message" => "message",
    "object_type" => "object type",
    "object_id" => "object",
    "id_employee" => "id employee",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps log";


$form->addControl("severity")->type("text")
->value(0);
$form->addControl("error_code")->type("text")
->value(0);
$form->addControl("message")->type("message");
$form->addControl("object_type")->type("text");
$form->addControl("object_id")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
