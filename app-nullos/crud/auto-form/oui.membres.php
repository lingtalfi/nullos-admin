<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.membres", ['id']);



$form->labels = [
    "id" => "id",
    "pseudo" => "pseudo",
    "email" => "email",
    "url_photo" => "url photo",
];


$form->title = "Membres";


$form->addControl("pseudo")->type("text");
$form->addControl("email")->type("text");
$form->addControl("url_photo")->type("text");


$form->display();
