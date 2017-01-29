<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_image", ['id_image']);



$form->labels = [
    "id_image" => "id image",
    "id_product" => "id product",
    "position" => "position",
    "cover" => "cover",
];


$form->title = "Ps image";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value("0");
$form->addControl("cover")->type("text")
->value(0);


$form->display();
