<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_lang", ['id_attribute', 'id_lang']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps attribute lang";


$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
