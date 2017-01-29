<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_contact_lang", ['id_contact', 'id_lang']);



$form->labels = [
    "id_contact" => "id contact",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
];


$form->title = "Ps contact lang";


$form->addControl("id_contact")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("description")->type("message");


$form->display();
