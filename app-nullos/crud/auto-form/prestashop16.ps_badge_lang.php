<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_badge_lang", ['id_badge', 'id_lang']);



$form->labels = [
    "id_badge" => "id badge",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
    "group_name" => "group name",
];


$form->title = "Ps badge lang";


$form->addControl("id_badge")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("description")->type("text");
$form->addControl("group_name")->type("text");


$form->display();
