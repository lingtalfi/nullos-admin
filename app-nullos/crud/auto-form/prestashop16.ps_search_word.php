<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_search_word", ['id_word']);



$form->labels = [
    "id_word" => "id word",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "word" => "word",
];


$form->title = "Ps search word";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("word")->type("text");


$form->display();
