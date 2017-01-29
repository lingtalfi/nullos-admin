<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_hook_module_exceptions", ['id_hook_module_exceptions']);



$form->labels = [
    "id_hook_module_exceptions" => "id hook module exceptions",
    "id_shop" => "id shop",
    "id_module" => "id module",
    "id_hook" => "id hook",
    "file_name" => "file name",
];


$form->title = "Ps hook module exceptions";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_hook")->type("text")
->value(0);
$form->addControl("file_name")->type("text");


$form->display();
