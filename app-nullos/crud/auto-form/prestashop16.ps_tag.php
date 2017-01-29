<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tag", ['id_tag']);



$form->labels = [
    "id_tag" => "id tag",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps tag";


$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
