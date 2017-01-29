<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_currency", ['id_module', 'id_shop', 'id_currency']);



$form->labels = [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_currency" => "id currency",
];


$form->title = "Ps module currency";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_currency")->type("text")
->value(0);


$form->display();
