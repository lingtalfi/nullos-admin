<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_configuration_lang", ['id_configuration', 'id_lang']);



$form->labels = [
    "id_configuration" => "id configuration",
    "id_lang" => "id lang",
    "value" => "value",
    "date_upd" => "date upd",
];


$form->title = "Ps configuration lang";


$form->addControl("id_configuration")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("value")->type("message");
$form->addControl("date_upd")->type("date6");


$form->display();
