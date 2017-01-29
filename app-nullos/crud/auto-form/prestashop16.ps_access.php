<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_access", ['id_profile', 'id_tab']);



$form->labels = [
    "id_profile" => "id profile",
    "id_tab" => "id tab",
    "view" => "view",
    "add" => "add",
    "edit" => "edit",
    "delete" => "delete",
];


$form->title = "Ps access";


$form->addControl("id_profile")->type("text")
->value(0);
$form->addControl("id_tab")->type("text")
->value(0);
$form->addControl("view")->type("text")
->value(0);
$form->addControl("add")->type("text")
->value(0);
$form->addControl("edit")->type("text")
->value(0);
$form->addControl("delete")->type("text")
->value(0);


$form->display();
