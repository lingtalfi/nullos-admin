<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_quick_access_lang", ['id_quick_access', 'id_lang']);



$form->labels = [
    "id_quick_access" => "id quick access",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps quick access lang";


$form->addControl("id_quick_access")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
