<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_category_lang", ['id_cms_category', 'id_shop', 'id_lang']);



$form->labels = [
    "id_cms_category" => "id cms category",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
    "description" => "description",
    "link_rewrite" => "link rewrite",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$form->title = "Ps cms category lang";


$form->addControl("id_cms_category")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("name")->type("text");
$form->addControl("description")->type("message");
$form->addControl("link_rewrite")->type("text");
$form->addControl("meta_title")->type("text");
$form->addControl("meta_keywords")->type("text");
$form->addControl("meta_description")->type("text");


$form->display();
