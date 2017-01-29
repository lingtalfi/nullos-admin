<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_module_access", ['id_profile', 'id_module']);



$form->labels = [
    "id_profile" => "id profile",
    "id_module" => "id module",
    "view" => "view",
    "configure" => "configure",
    "uninstall" => "uninstall",
];


$form->title = "Ps module access";


$form->addControl("id_profile")->type("text")
->value(0);
$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("view")->type("text")
->value("0");
$form->addControl("configure")->type("text")
->value("0");
$form->addControl("uninstall")->type("text")
->value("0");


$form->display();
