<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_theme_specific", ['id_theme', 'id_shop', 'entity', 'id_object']);



$form->labels = [
    "id_theme" => "id theme",
    "id_shop" => "id shop",
    "entity" => "entity",
    "id_object" => "id object",
];


$form->title = "Ps theme specific";


$form->addControl("id_theme")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("entity")->type("text")
->value(0);
$form->addControl("id_object")->type("text")
->value(0);


$form->display();
