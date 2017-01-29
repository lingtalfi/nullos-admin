<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module", ['id_module']);



$form->labels = [
    "id_module" => "id module",
    "name" => "name",
    "active" => "active",
    "version" => "version",
];


$form->title = "Ps module";


$form->addControl("name")->type("text");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("version")->type("text");


$form->display();
