<?php


use Crud\CrudModule;

$form = CrudModule::getForm("users", ['id']);



$form->labels = [
    "id" => "id",
    "active" => "active",
    "email" => "email",
    "pseudo" => "pseudo",
    "password" => "mot de passe",
    "url_photo" => "url de la photo",
    "nom" => "nom",
    "prenom" => "prenom",
    "sexe" => "sexe",
    "date_naissance" => "date naissance",
    "code_postal" => "code postal",
    "ville" => "ville",
    "pays_id" => "pays",
    "niveaux_id" => "niveau",
    "biographie" => "biographie",
    "influences" => "influences",
    "prochains_concerts" => "prochains concerts",
    "sites_internet" => "sites internet",
    "newsletter" => "newsletter",
    "show_sexe" => "affichage sexe",
    "show_date_naissance" => "affichage date de naissance",
    "show_niveau" => "affichage niveau",
];


$form->title = "Users";


$form->addControl("niveaux_id")->type("selectByRequest", "select id, nom from niveaux");
$form->addControl("pays_id")->type("selectByRequest", "select id, nom from pays");
$form->addControl("active")->type("text");
$form->addControl("email")->type("text");
$form->addControl("pseudo")->type("text")
->addConstraint("required");
$form->addControl("password")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("nom")->type("text");
$form->addControl("prenom")->type("text");
$form->addControl("sexe")->type("text");
$form->addControl("date_naissance")->type("date3");
$form->addControl("code_postal")->type("text");
$form->addControl("ville")->type("text");
$form->addControl("biographie")->type("message");
$form->addControl("influences")->type("message");
$form->addControl("prochains_concerts")->type("message");
$form->addControl("sites_internet")->type("message");
$form->addControl("newsletter")->type("text");
$form->addControl("show_sexe")->type("text");
$form->addControl("show_date_naissance")->type("text");
$form->addControl("show_niveau")->type("text");


$form->display();
