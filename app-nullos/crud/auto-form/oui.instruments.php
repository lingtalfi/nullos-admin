<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.instruments", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Instruments";


$form->addControl("nom")->type("text")
->addConstraint("required");


$form->display();
