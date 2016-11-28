<?php


use Crud\CrudModule;

$form = CrudModule::getForm("oui.equipe_has_membres", ['equipe_id', 'membres_id']);



$form->labels = [
    "equipe_id" => "equipe",
    "membres_id" => "membres",
];


$form->title = "Equipe has membres";


$form->addControl("equipe_id")->type("selectByRequest", "select id, nom from oui.equipe");
$form->addControl("membres_id")->type("selectByRequest", "select id, pseudo from oui.membres");


$form->display();
