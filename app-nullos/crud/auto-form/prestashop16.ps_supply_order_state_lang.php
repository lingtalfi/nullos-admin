<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order_state_lang", ['id_supply_order_state', 'id_lang']);



$form->labels = [
    "id_supply_order_state" => "id supply order state",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps supply order state lang";


$form->addControl("id_supply_order_state")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
