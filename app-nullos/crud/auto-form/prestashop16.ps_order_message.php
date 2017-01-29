<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_message", ['id_order_message']);



$form->labels = [
    "id_order_message" => "id order message",
    "date_add" => "date add",
];


$form->title = "Ps order message";


$form->addControl("date_add")->type("date6");


$form->display();
