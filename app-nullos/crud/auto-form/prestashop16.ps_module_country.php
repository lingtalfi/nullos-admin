<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_country", ['id_module', 'id_shop', 'id_country']);



$form->labels = [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_country" => "id country",
];


$form->title = "Ps module country";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_country")->type("text")
->value(0);


$form->display();
