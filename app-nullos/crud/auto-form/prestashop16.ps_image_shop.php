<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_image_shop", ['id_image', 'id_shop']);



$form->labels = [
    "id_product" => "id product",
    "id_image" => "id image",
    "id_shop" => "id shop",
    "cover" => "cover",
];


$form->title = "Ps image shop";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_image")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("cover")->type("text")
->value(0);


$form->display();
