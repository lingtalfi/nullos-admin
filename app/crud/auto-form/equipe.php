<?php


use Crud\CrudModule;

$form = CrudModule::getForm("equipe", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "équipe";


$form->addControl("nom")->type("text")
->addConstraint("required");


$form->display();
