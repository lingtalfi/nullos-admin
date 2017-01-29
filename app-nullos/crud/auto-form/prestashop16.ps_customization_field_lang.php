<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customization_field_lang", ['id_customization_field', 'id_lang', 'id_shop']);



$form->labels = [
    "id_customization_field" => "id customization field",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
];


$form->title = "Ps customization field lang";


$form->addControl("id_customization_field")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("name")->type("text");


$form->display();
