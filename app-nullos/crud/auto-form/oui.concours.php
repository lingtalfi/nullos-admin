<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.concours", ['id']);



$form->labels = [
    "id" => "id",
    "equipe_id" => "equipe id",
    "titre" => "titre",
    "url_photo" => "url photo",
    "url_video" => "url video",
    "date_debut" => "date debut",
    "date_fin" => "date fin",
    "lots" => "lots",
    "reglement" => "reglement",
    "description" => "description",
];


$form->title = "Concours";


$form->addControl("equipe_id")->type("selectByRequest", "select id, nom from oui.equipe");
$form->addControl("titre")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("url_video")->type("text");
$form->addControl("date_debut")->type("date6");
$form->addControl("date_fin")->type("date6");
$form->addControl("lots")->type("message");
$form->addControl("reglement")->type("message");
$form->addControl("description")->type("message");


$form->display();
