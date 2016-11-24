<?php


use Crud\CrudModule;

$form = CrudModule::getForm("users_has_styles_musicaux", ['users_id', 'styles_musicaux_id']);



$form->labels = [
    "users_id" => "utilisateur",
    "styles_musicaux_id" => "style musical",
];


$form->title = "Styles musicaux des utilisateurs";


$form->addControl("styles_musicaux_id")->type("selectByRequest", "select id, nom from styles_musicaux");
$form->addControl("users_id")->type("selectByRequest", "select id, pseudo from users");


$form->display();
