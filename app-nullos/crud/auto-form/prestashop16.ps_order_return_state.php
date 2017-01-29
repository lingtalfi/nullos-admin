<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_return_state", ['id_order_return_state']);



$form->labels = [
    "id_order_return_state" => "id order return state",
    "color" => "color",
];


$form->title = "Ps order return state";


$form->addControl("color")->type("text");


$form->display();
