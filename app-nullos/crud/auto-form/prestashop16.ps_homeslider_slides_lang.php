<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_homeslider_slides_lang", ['id_homeslider_slides', 'id_lang']);



$form->labels = [
    "id_homeslider_slides" => "id homeslider slides",
    "id_lang" => "id lang",
    "title" => "title",
    "description" => "description",
    "legend" => "legend",
    "url" => "url",
    "image" => "image",
];


$form->title = "Ps homeslider slides lang";


$form->addControl("id_homeslider_slides")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("title")->type("text");
$form->addControl("description")->type("message");
$form->addControl("legend")->type("text");
$form->addControl("url")->type("text");
$form->addControl("image")->type("text");


$form->display();
