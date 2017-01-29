<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_group_lang", ['id_group', 'id_lang']);



$form->labels = [
    "id_group" => "id group",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps group lang";


$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
