<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_lang", ['id_cms', 'id_shop', 'id_lang']);



$form->labels = [
    "id_cms" => "id cms",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "meta_title" => "meta title",
    "meta_description" => "meta description",
    "meta_keywords" => "meta keywords",
    "content" => "content",
    "link_rewrite" => "link rewrite",
];


$form->title = "Ps cms lang";


$form->addControl("id_cms")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("meta_title")->type("text");
$form->addControl("meta_description")->type("text");
$form->addControl("meta_keywords")->type("text");
$form->addControl("content")->type("text");
$form->addControl("link_rewrite")->type("text");


$form->display();
