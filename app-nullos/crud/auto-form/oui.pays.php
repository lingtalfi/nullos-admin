<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.pays", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Pays";


$form->addControl("nom")->type("text");


$form->display();
