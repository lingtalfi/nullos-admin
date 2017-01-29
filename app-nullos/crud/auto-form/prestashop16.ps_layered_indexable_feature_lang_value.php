<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_indexable_feature_lang_value", ['id_feature', 'id_lang']);



$form->labels = [
    "id_feature" => "id feature",
    "id_lang" => "id lang",
    "url_name" => "url name",
    "meta_title" => "meta title",
];


$form->title = "Ps layered indexable feature lang value";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("url_name")->type("text");
$form->addControl("meta_title")->type("text");


$form->display();