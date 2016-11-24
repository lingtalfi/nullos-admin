<?php


use Crud\CrudModule;

$form = CrudModule::getForm("membres", ['id']);



$form->labels = [
    "id" => "id",
    "pseudo" => "pseudo",
    "email" => "email",
    "url_photo" => "url de la photo",
];


$form->title = "Membres";


$form->addControl("pseudo")->type("text")
->addConstraint("required");
$form->addControl("email")->type("text");
$form->addControl("url_photo")->type("text");


$form->display();
