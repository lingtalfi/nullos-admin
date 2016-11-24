<?php


use Crud\CrudModule;

$form = CrudModule::getForm("users_has_instruments", ['users_id', 'instruments_id']);



$form->labels = [
    "users_id" => "utilisateur",
    "instruments_id" => "instrument",
];


$form->title = "Instruments des utilisateurs";


$form->addControl("instruments_id")->type("selectByRequest", "select id, nom from instruments");
$form->addControl("users_id")->type("selectByRequest", "select id, pseudo from users");


$form->display();
