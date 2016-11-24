<?php


use Crud\CrudModule;

$form = CrudModule::getForm("equipe_has_membres", ['equipe_id', 'membres_id']);



$form->labels = [
    "equipe_id" => "équipe",
    "membres_id" => "membre",
];


$form->title = "Membres des équipes";


$form->addControl("equipe_id")->type("selectByRequest", "select id, nom from equipe");
$form->addControl("membres_id")->type("selectByRequest", "select id, pseudo from membres");


$form->display();
