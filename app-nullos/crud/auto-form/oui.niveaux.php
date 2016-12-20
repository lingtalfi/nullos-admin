<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.niveaux", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Niveaux";


$form->addControl("nom")->type("text")
->addConstraint("required");


$form->display();
