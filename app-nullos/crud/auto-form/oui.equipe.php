<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.equipe", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Equipe";


$form->addControl("nom")->type("text")
->addConstraint("required");


$form->display();
