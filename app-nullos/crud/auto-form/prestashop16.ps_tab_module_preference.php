<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tab_module_preference", ['id_tab_module_preference']);



$form->labels = [
    "id_tab_module_preference" => "id tab module preference",
    "id_employee" => "id employee",
    "id_tab" => "id tab",
    "module" => "module",
];


$form->title = "Ps tab module preference";


$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("id_tab")->type("text")
->value(0);
$form->addControl("module")->type("text");


$form->display();
