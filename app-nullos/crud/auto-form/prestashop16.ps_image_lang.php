<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_image_lang", ['id_image', 'id_lang']);



$form->labels = [
    "id_image" => "id image",
    "id_lang" => "id lang",
    "legend" => "legend",
];


$form->title = "Ps image lang";


$form->addControl("id_image")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("legend")->type("text");


$form->display();
