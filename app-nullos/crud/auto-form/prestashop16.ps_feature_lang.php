<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature_lang", ['id_feature', 'id_lang']);



$form->labels = [
    "id_feature" => "id feature",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps feature lang";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
