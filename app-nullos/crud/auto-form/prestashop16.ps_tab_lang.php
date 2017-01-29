<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tab_lang", ['id_tab', 'id_lang']);



$form->labels = [
    "id_tab" => "id tab",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps tab lang";


$form->addControl("id_tab")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
