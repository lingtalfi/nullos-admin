<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_group_lang", ['id_attribute_group', 'id_lang']);



$form->labels = [
    "id_attribute_group" => "id attribute group",
    "id_lang" => "id lang",
    "name" => "name",
    "public_name" => "public name",
];


$form->title = "Ps attribute group lang";


$form->addControl("id_attribute_group")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("public_name")->type("text");


$form->display();
