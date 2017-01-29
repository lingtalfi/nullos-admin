<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_lang", ['id_product', 'id_shop', 'id_lang']);



$form->labels = [
    "id_product" => "id product",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "description" => "description",
    "description_short" => "description short",
    "link_rewrite" => "link rewrite",
    "meta_description" => "meta description",
    "meta_keywords" => "meta keywords",
    "meta_title" => "meta title",
    "name" => "name",
    "available_now" => "available now",
    "available_later" => "available later",
];


$form->title = "Ps product lang";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("description")->type("message");
$form->addControl("description_short")->type("message");
$form->addControl("link_rewrite")->type("text");
$form->addControl("meta_description")->type("text");
$form->addControl("meta_keywords")->type("text");
$form->addControl("meta_title")->type("text");
$form->addControl("name")->type("text");
$form->addControl("available_now")->type("text");
$form->addControl("available_later")->type("text");


$form->display();
