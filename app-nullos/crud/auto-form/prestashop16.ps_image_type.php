<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_image_type", ['id_image_type']);



$form->labels = [
    "id_image_type" => "id image type",
    "name" => "name",
    "width" => "width",
    "height" => "height",
    "products" => "products",
    "categories" => "categories",
    "manufacturers" => "manufacturers",
    "suppliers" => "suppliers",
    "scenes" => "scenes",
    "stores" => "stores",
];


$form->title = "Ps image type";


$form->addControl("name")->type("text");
$form->addControl("width")->type("text")
->value(0);
$form->addControl("height")->type("text")
->value(0);
$form->addControl("products")->type("text")
->value("1");
$form->addControl("categories")->type("text")
->value("1");
$form->addControl("manufacturers")->type("text")
->value("1");
$form->addControl("suppliers")->type("text")
->value("1");
$form->addControl("scenes")->type("text")
->value("1");
$form->addControl("stores")->type("text")
->value("1");


$form->display();
