<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_return_state_lang", ['id_order_return_state', 'id_lang']);



$form->labels = [
    "id_order_return_state" => "id order return state",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps order return state lang";


$form->addControl("id_order_return_state")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
