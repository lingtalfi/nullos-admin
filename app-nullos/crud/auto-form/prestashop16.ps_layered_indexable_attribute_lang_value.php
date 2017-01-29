<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_indexable_attribute_lang_value", ['id_attribute', 'id_lang']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_lang" => "id lang",
    "url_name" => "url name",
    "meta_title" => "meta title",
];


$form->title = "Ps layered indexable attribute lang value";


$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("url_name")->type("text");
$form->addControl("meta_title")->type("text");


$form->display();
