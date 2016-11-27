<?php


use Crud\CrudModule;

$form = CrudModule::getForm("ville.villes_france_free", ['ville_id']);



$form->labels = [
    "ville_id" => "ville id",
    "ville_departement" => "ville departement",
    "ville_slug" => "ville slug",
    "ville_nom" => "ville nom",
    "ville_nom_simple" => "ville nom simple",
    "ville_nom_reel" => "ville nom reel",
    "ville_nom_soundex" => "ville nom soundex",
    "ville_nom_metaphone" => "ville nom metaphone",
    "ville_code_postal" => "ville code postal",
    "ville_commune" => "ville commune",
    "ville_code_commune" => "ville code commune",
    "ville_arrondissement" => "ville arrondissement",
    "ville_canton" => "ville canton",
    "ville_amdi" => "ville amdi",
    "ville_population_2010" => "ville population 2010",
    "ville_population_1999" => "ville population 1999",
    "ville_population_2012" => "ville population 2012",
    "ville_densite_2010" => "ville densite 2010",
    "ville_surface" => "ville surface",
    "ville_longitude_deg" => "ville longitude deg",
    "ville_latitude_deg" => "ville latitude deg",
    "ville_longitude_grd" => "ville longitude grd",
    "ville_latitude_grd" => "ville latitude grd",
    "ville_longitude_dms" => "ville longitude dms",
    "ville_latitude_dms" => "ville latitude dms",
    "ville_zmin" => "ville zmin",
    "ville_zmax" => "ville zmax",
];


$form->title = "Villes france free";


$form->addControl("ville_departement")->type("text");
$form->addControl("ville_slug")->type("text");
$form->addControl("ville_nom")->type("text");
$form->addControl("ville_nom_simple")->type("text");
$form->addControl("ville_nom_reel")->type("text");
$form->addControl("ville_nom_soundex")->type("text");
$form->addControl("ville_nom_metaphone")->type("text");
$form->addControl("ville_code_postal")->type("text");
$form->addControl("ville_commune")->type("text");
$form->addControl("ville_code_commune")->type("text");
$form->addControl("ville_arrondissement")->type("text");
$form->addControl("ville_canton")->type("text");
$form->addControl("ville_amdi")->type("text");
$form->addControl("ville_population_2010")->type("text");
$form->addControl("ville_population_1999")->type("text");
$form->addControl("ville_population_2012")->type("text");
$form->addControl("ville_densite_2010")->type("text");
$form->addControl("ville_surface")->type("text");
$form->addControl("ville_longitude_deg")->type("text");
$form->addControl("ville_latitude_deg")->type("text");
$form->addControl("ville_longitude_grd")->type("text");
$form->addControl("ville_latitude_grd")->type("text");
$form->addControl("ville_longitude_dms")->type("text");
$form->addControl("ville_latitude_dms")->type("text");
$form->addControl("ville_zmin")->type("text");
$form->addControl("ville_zmax")->type("text");


$form->display();
