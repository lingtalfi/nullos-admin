<?php


use Crud\CrudModule;

$form = CrudModule::getForm("configuration", ['cle']);



$form->labels = [
    "cle" => "clé",
    "valeur" => "valeur",
];


$form->title = "Configuration";


$form->addControl("cle")->type("text");
$form->addControl("valeur")->type("text");


$form->display();
