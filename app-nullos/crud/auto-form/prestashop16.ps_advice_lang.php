<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_advice_lang", ['id_advice', 'id_lang']);



$form->labels = [
    "id_advice" => "id advice",
    "id_lang" => "id lang",
    "html" => "html",
];


$form->title = "Ps advice lang";


$form->addControl("id_advice")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("html")->type("message");


$form->display();
