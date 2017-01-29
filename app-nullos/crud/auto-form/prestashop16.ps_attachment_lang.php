<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attachment_lang", ['id_attachment', 'id_lang']);



$form->labels = [
    "id_attachment" => "id attachment",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
];


$form->title = "Ps attachment lang";


$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("description")->type("message");


$form->display();
