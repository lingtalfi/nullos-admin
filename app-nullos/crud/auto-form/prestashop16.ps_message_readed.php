<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_message_readed", ['id_message', 'id_employee']);



$form->labels = [
    "id_message" => "id message",
    "id_employee" => "id employee",
    "date_add" => "date add",
];


$form->title = "Ps message readed";


$form->addControl("id_message")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");


$form->display();
