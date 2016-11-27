<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.users_has_styles_musicaux", ['users_id', 'styles_musicaux_id']);



$form->labels = [
    "users_id" => "users id",
    "styles_musicaux_id" => "styles musicaux id",
];


$form->title = "Users has styles musicaux";


$form->addControl("styles_musicaux_id")->type("selectByRequest", "select id, nom from oui.styles_musicaux");
$form->addControl("users_id")->type("selectByRequest", "select id, email from oui.users");


$form->display();
