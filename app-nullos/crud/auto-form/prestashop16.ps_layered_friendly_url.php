<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_friendly_url", ['id_layered_friendly_url']);



$form->labels = [
    "id_layered_friendly_url" => "id layered friendly url",
    "url_key" => "url key",
    "data" => "data",
    "id_lang" => "id lang",
];


$form->title = "Ps layered friendly url";


$form->addControl("url_key")->type("text");
$form->addControl("data")->type("text");
$form->addControl("id_lang")->type("text")
->value(0);


$form->display();
