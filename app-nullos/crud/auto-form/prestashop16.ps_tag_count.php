<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tag_count", ['id_group', 'id_tag']);



$form->labels = [
    "id_group" => "id group",
    "id_tag" => "id tag",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "counter" => "counter",
];


$form->title = "Ps tag count";


$form->addControl("id_group")->type("text")
->value("0");
$form->addControl("id_tag")->type("text")
->value("0");
$form->addControl("id_lang")->type("text")
->value("0");
$form->addControl("id_shop")->type("text")
->value("0");
$form->addControl("counter")->type("text")
->value("0");


$form->display();
