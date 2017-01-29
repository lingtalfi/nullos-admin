<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_import_match", ['id_import_match']);



$form->labels = [
    "id_import_match" => "id import match",
    "name" => "name",
    "match" => "match",
    "skip" => "skip",
];


$form->title = "Ps import match";


$form->addControl("name")->type("text");
$form->addControl("match")->type("message");
$form->addControl("skip")->type("text")
->value(0);


$form->display();
