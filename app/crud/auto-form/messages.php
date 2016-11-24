<?php


use Crud\CrudModule;

$form = CrudModule::getForm("messages", ['id']);



$form->labels = [
    "id" => "id",
    "objet" => "objet",
    "message" => "message",
    "email" => "email",
    "date_creation" => "date création",
];


$form->title = "Messages";


$form->addControl("objet")->type("text");
$form->addControl("message")->type("message");
$form->addControl("email")->type("text");
$form->addControl("date_creation")->type("date6");


$form->display();
