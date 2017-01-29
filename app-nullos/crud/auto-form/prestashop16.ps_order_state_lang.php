<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_state_lang", ['id_order_state', 'id_lang']);



$form->labels = [
    "id_order_state" => "id order state",
    "id_lang" => "id lang",
    "name" => "name",
    "template" => "template",
];


$form->title = "Ps order state lang";


$form->addControl("id_order_state")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("template")->type("text");


$form->display();
