<?php


use Crud\CrudModule;

$form = CrudModule::getForm("coups_de_coeur", ['id']);



$form->labels = [
    "id" => "id",
    "videos_id" => "vidéo",
    "position" => "position",
];


$form->title = "Coups de coeur";


$form->addControl("videos_id")->type("selectByRequest", "select id, titre from videos");
$form->addControl("position")->type("text");


$form->display();
