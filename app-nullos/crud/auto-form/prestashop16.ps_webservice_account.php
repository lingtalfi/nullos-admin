<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_webservice_account", ['id_webservice_account']);



$form->labels = [
    "id_webservice_account" => "id webservice account",
    "key" => "key",
    "description" => "description",
    "class_name" => "class name",
    "is_module" => "is module",
    "module_name" => "module name",
    "active" => "active",
];


$form->title = "Ps webservice account";


$form->addControl("key")->type("text");
$form->addControl("description")->type("message");
$form->addControl("class_name")->type("text")
->value("WebserviceRequest");
$form->addControl("is_module")->type("text")
->value("0");
$form->addControl("module_name")->type("text");
$form->addControl("active")->type("text")
->value(0);


$form->display();
