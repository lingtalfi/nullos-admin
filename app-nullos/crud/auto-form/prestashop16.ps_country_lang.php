<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_country_lang", ['id_country', 'id_lang']);



$form->labels = [
    "id_country" => "id country",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps country lang";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
