<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_info_lang", ['id_info', 'id_lang']);



$form->labels = [
    "id_info" => "id info",
    "id_lang" => "id lang",
    "text" => "text",
];


$form->title = "Ps info lang";


$form->addControl("id_info")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("text")->type("message");


$form->display();
