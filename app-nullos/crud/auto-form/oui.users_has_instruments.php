<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.users_has_instruments", ['users_id', 'instruments_id']);



$form->labels = [
    "users_id" => "users",
    "instruments_id" => "instruments",
];


$form->title = "Users has instruments";


$form->addControl("instruments_id")->type("selectByRequest", "select id, nom from oui.instruments");
$form->addControl("users_id")->type("selectByRequest", "select id, email from oui.users");


$form->display();
