<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_homeslider_slides", ['id_homeslider_slides']);



$form->labels = [
    "id_homeslider_slides" => "id homeslider slides",
    "position" => "position",
    "active" => "active",
];


$form->title = "Ps homeslider slides";


$form->addControl("position")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");


$form->display();
