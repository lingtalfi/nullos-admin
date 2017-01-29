<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_search_index", ['id_word', 'id_product']);



$form->labels = [
    "id_product" => "id product",
    "id_word" => "id word",
    "weight" => "weight",
];


$form->title = "Ps search index";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_word")->type("text")
->value(0);
$form->addControl("weight")->type("text")
->value("1");


$form->display();
