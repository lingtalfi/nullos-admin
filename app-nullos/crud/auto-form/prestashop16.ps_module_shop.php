<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_shop", ['id_module', 'id_shop']);



$form->labels = [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "enable_device" => "enable device",
];


$form->title = "Ps module shop";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("enable_device")->type("text")
->value("7");


$form->display();
