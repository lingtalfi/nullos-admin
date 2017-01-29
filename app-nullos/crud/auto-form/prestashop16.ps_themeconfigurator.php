<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_themeconfigurator", ['id_item']);



$form->labels = [
    "id_item" => "id item",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "item_order" => "item order",
    "title" => "title",
    "title_use" => "title use",
    "hook" => "hook",
    "url" => "url",
    "target" => "target",
    "image" => "image",
    "image_w" => "image w",
    "image_h" => "image h",
    "html" => "html",
    "active" => "active",
];


$form->title = "Ps themeconfigurator";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("item_order")->type("text")
->value(0);
$form->addControl("title")->type("text");
$form->addControl("title_use")->type("text")
->value("0");
$form->addControl("hook")->type("text");
$form->addControl("url")->type("message");
$form->addControl("target")->type("text")
->value("0");
$form->addControl("image")->type("text");
$form->addControl("image_w")->type("text");
$form->addControl("image_h")->type("text");
$form->addControl("html")->type("message");
$form->addControl("active")->type("text")
->value("1");


$form->display();
