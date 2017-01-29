<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_meta_lang", ['id_meta', 'id_shop', 'id_lang']);



$form->labels = [
    "id_meta" => "id meta",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "title" => "title",
    "description" => "description",
    "keywords" => "keywords",
    "url_rewrite" => "url rewrite",
];


$form->title = "Ps meta lang";


$form->addControl("id_meta")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("title")->type("text");
$form->addControl("description")->type("text");
$form->addControl("keywords")->type("text");
$form->addControl("url_rewrite")->type("text");


$form->display();
