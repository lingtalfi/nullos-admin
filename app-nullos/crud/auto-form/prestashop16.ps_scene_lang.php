<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_scene_lang", ['id_scene', 'id_lang']);



$form->labels = [
    "id_scene" => "id scene",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps scene lang";


$form->addControl("id_scene")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
