<?php


use Crud\CrudModule;

$form = CrudModule::getForm("videos", ['id']);



$form->labels = [
    "id" => "id",
    "active" => "actif",
    "users_id" => "utilisateur",
    "concours_id" => "concours",
    "titre" => "titre",
    "url" => "url",
    "url_photo" => "url de la photo",
    "nb_likes" => "nb likes",
    "nb_vues" => "nb vues",
    "date_creation" => "date création",
];


$form->title = "Vidéos";


$form->addControl("concours_id")->type("selectByRequest", "select id, titre from concours");
$form->addControl("users_id")->type("selectByRequest", "select id, pseudo from users");
$form->addControl("active")->type("text");
$form->addControl("titre")->type("text")
->addConstraint("required");
$form->addControl("url")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("nb_likes")->type("text");
$form->addControl("nb_vues")->type("text");
$form->addControl("date_creation")->type("date6");


$form->display();
