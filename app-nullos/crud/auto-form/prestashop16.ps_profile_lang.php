<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_profile_lang", ['id_profile', 'id_lang']);



$form->labels = [
    "id_lang" => "id lang",
    "id_profile" => "id profile",
    "name" => "name",
];


$form->title = "Ps profile lang";


$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_profile")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
