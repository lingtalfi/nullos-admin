<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_group", ['id_module', 'id_shop', 'id_group']);



$form->labels = [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_group" => "id group",
];


$form->title = "Ps module group";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_group")->type("text")
->value(0);


$form->display();
