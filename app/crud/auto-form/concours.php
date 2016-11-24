<?php


use Crud\CrudModule;

$form = CrudModule::getForm("concours", ['id']);



$form->labels = [
    "id" => "id",
    "equipe_id" => "équipe",
    "titre" => "titre",
    "url_photo" => "url de la photo",
    "url_video" => "url de la vidéo",
    "date_debut" => "date début",
    "date_fin" => "date fin",
    "lots" => "lots",
    "reglement" => "règlement",
    "description" => "description",
];


$form->title = "Concours";


$form->addControl("equipe_id")->type("selectByRequest", "select id, nom from equipe");
$form->addControl("titre")->type("text")
->addConstraint("required");
$form->addControl("url_photo")->type("text");
$form->addControl("url_video")->type("text");
$form->addControl("date_debut")->type("date6");
$form->addControl("date_fin")->type("date6");
$form->addControl("lots")->type("message");
$form->addControl("reglement")->type("message");
$form->addControl("description")->type("message");


$form->display();
