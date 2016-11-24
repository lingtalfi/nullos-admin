<?php


use Crud\CrudModule;

$form = CrudModule::getForm("pays", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Pays";


$form->addControl("nom")->type("text")
->addConstraint("required");


$form->display();
