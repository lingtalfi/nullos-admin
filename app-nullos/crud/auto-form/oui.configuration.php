<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.configuration", ['cle']);



$form->labels = [
    "cle" => "cle",
    "valeur" => "valeur",
];


$form->title = "Configuration";


$form->addControl("cle")->type("text")
->addConstraint("required");
$form->addControl("valeur")->type("text");


$form->display();
