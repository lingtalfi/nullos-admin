<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.videos", ['id']);



$form->labels = [
    "id" => "id",
    "active" => "active",
    "users_id" => "users id",
    "concours_id" => "concours id",
    "titre" => "titre",
    "url" => "url",
    "url_photo" => "url photo",
    "nb_likes" => "nb likes",
    "nb_vues" => "nb vues",
    "date_creation" => "date creation",
];


$form->title = "Videos";


$form->addControl("concours_id")->type("selectByRequest", "select id, titre from oui.concours");
$form->addControl("users_id")->type("selectByRequest", "select id, email from oui.users");
$form->addControl("active")->type("text");
$form->addControl("titre")->type("text");
$form->addControl("url")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("nb_likes")->type("text");
$form->addControl("nb_vues")->type("text");
$form->addControl("date_creation")->type("date6");


$form->display();
