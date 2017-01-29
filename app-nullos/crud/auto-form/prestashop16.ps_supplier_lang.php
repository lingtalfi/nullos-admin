<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supplier_lang", ['id_supplier', 'id_lang']);



$form->labels = [
    "id_supplier" => "id supplier",
    "id_lang" => "id lang",
    "description" => "description",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$form->title = "Ps supplier lang";


$form->addControl("id_supplier")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("description")->type("message");
$form->addControl("meta_title")->type("text");
$form->addControl("meta_keywords")->type("text");
$form->addControl("meta_description")->type("text");


$form->display();
