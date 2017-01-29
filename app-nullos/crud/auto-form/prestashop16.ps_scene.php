<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_scene", ['id_scene']);



$form->labels = [
    "id_scene" => "id scene",
    "active" => "active",
];


$form->title = "Ps scene";


$form->addControl("active")->type("text")
->value("1");


$form->display();
