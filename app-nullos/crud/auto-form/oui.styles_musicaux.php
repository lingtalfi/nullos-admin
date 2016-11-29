<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.styles_musicaux", ['id']);



$form->labels = [
    "id" => "id",
    "nom" => "nom",
];


$form->title = "Styles musicaux";


$form->addControl("nom")->type("text");


$form->display();
