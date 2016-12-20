<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.users", ['id']);



$form->labels = [
    "id" => "id",
    "active" => "active",
    "email" => "email",
    "pseudo" => "pseudo",
    "password" => "password",
    "url_photo" => "url photo",
    "nom" => "nom",
    "prenom" => "prenom",
    "sexe" => "sexe",
    "date_naissance" => "date naissance",
    "code_postal" => "code postal",
    "ville" => "ville",
    "pays_id" => "pays",
    "niveaux_id" => "niveaux",
    "biographie" => "biographie",
    "influences" => "influences",
    "prochains_concerts" => "prochains concerts",
    "sites_internet" => "sites internet",
    "newsletter" => "newsletter",
    "show_sexe" => "show sexe",
    "show_date_naissance" => "show date naissance",
    "show_niveau" => "show niveau",
];


$form->title = "Users";


$form->addControl("active")->type("text")
->value(0);
$form->addControl("email")->type("text")
->addConstraint("required");
$form->addControl("pseudo")->type("text");
$form->addControl("password")->type("text");
$form->addControl("url_photo")->type("text");
$form->addControl("nom")->type("text");
$form->addControl("prenom")->type("text");
$form->addControl("sexe")->type("text");
$form->addControl("date_naissance")->type("date3");
$form->addControl("code_postal")->type("text");
$form->addControl("ville")->type("text");
$form->addControl("pays_id")->type("selectByRequest", "select id, nom from oui.pays");
$form->addControl("niveaux_id")->type("selectByRequest", "select id, nom from oui.niveaux");
$form->addControl("biographie")->type("message");
$form->addControl("influences")->type("message");
$form->addControl("prochains_concerts")->type("message");
$form->addControl("sites_internet")->type("message");
$form->addControl("newsletter")->type("radioList", ['y','n']);
$form->addControl("show_sexe")->type("radioList", ['y','n']);
$form->addControl("show_date_naissance")->type("radioList", ['y','n']);
$form->addControl("show_niveau")->type("radioList", ['y','n']);


$form->display();
