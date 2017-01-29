<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_preference", ['id_module_preference']);



$form->labels = [
    "id_module_preference" => "id module preference",
    "id_employee" => "id employee",
    "module" => "module",
    "interest" => "interest",
    "favorite" => "favorite",
];


$form->title = "Ps module preference";


$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("module")->type("text");
$form->addControl("interest")->type("text")
->value(0);
$form->addControl("favorite")->type("text")
->value(0);


$form->display();
