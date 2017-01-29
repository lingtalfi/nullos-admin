<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_hook_alias", ['id_hook_alias']);



$form->labels = [
    "id_hook_alias" => "id hook alias",
    "alias" => "alias",
    "name" => "name",
];


$form->title = "Ps hook alias";


$form->addControl("alias")->type("text");
$form->addControl("name")->type("text");


$form->display();
