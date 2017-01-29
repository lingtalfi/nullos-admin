<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_lang_shop", ['id_lang', 'id_shop']);



$form->labels = [
    "id_lang" => "id lang",
    "id_shop" => "id shop",
];


$form->title = "Ps lang shop";


$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
