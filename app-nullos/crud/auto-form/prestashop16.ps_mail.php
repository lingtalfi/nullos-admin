<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_mail", ['id_mail']);



$form->labels = [
    "id_mail" => "id mail",
    "recipient" => "recipient",
    "template" => "template",
    "subject" => "subject",
    "id_lang" => "id lang",
    "date_add" => "date add",
];


$form->title = "Ps mail";


$form->addControl("recipient")->type("text");
$form->addControl("template")->type("text");
$form->addControl("subject")->type("text");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("date_add")->type("text")
->value("CURRENT_TIMESTAMP");


$form->display();
