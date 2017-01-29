<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_message_lang", ['id_order_message', 'id_lang']);



$form->labels = [
    "id_order_message" => "id order message",
    "id_lang" => "id lang",
    "name" => "name",
    "message" => "message",
];


$form->title = "Ps order message lang";


$form->addControl("id_order_message")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("message")->type("message");


$form->display();
