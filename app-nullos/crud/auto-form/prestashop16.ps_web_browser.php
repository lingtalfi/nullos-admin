<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_web_browser", ['id_web_browser']);



$form->labels = [
    "id_web_browser" => "id web browser",
    "name" => "name",
];


$form->title = "Ps web browser";


$form->addControl("name")->type("text");


$form->display();
