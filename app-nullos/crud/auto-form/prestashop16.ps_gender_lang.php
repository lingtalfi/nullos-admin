<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_gender_lang", ['id_gender', 'id_lang']);



$form->labels = [
    "id_gender" => "id gender",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps gender lang";


$form->addControl("id_gender")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
