<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_manufacturer_lang", ['id_manufacturer', 'id_lang']);



$form->labels = [
    "id_manufacturer" => "id manufacturer",
    "id_lang" => "id lang",
    "description" => "description",
    "short_description" => "short description",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$form->title = "Ps manufacturer lang";


$form->addControl("id_manufacturer")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("description")->type("message");
$form->addControl("short_description")->type("message");
$form->addControl("meta_title")->type("text");
$form->addControl("meta_keywords")->type("text");
$form->addControl("meta_description")->type("text");


$form->display();
