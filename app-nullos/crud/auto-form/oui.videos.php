<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.videos", ['id']);



$form->labels = [
    "id" => "id",
    "active" => "active",
    "users_id" => "users",
    "concours_id" => "concours",
    "titre" => "titre",
    "url" => "url",
    "url_photo" => "url photo",
    "nb_likes" => "nb likes",
    "nb_vues" => "nb vues",
    "date_creation" => "date creation",
];


$form->title = "Videos";


$form->addControl("active")->type("text")
->value(0);
$form->addControl("users_id")->type("selectByRequest", "select id, email from oui.users");
$form->addControl("concours_id")->type("selectByRequest", "select id, titre from oui.concours");
$form->addControl("titre")->type("text")
->addConstraint("required");
$form->addControl("url")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("nb_likes")->type("text")
->value(0);
$form->addControl("nb_vues")->type("text")
->value(0);
$form->addControl("date_creation")->type("date6");


$form->display();
