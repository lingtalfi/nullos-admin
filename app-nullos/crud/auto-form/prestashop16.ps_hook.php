<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_hook", ['id_hook']);



$form->labels = [
    "id_hook" => "id hook",
    "name" => "name",
    "title" => "title",
    "description" => "description",
    "position" => "position",
    "live_edit" => "live edit",
];


$form->title = "Ps hook";


$form->addControl("name")->type("text");
$form->addControl("title")->type("text");
$form->addControl("description")->type("message");
$form->addControl("position")->type("text")
->value("1");
$form->addControl("live_edit")->type("text")
->value("0");


$form->display();
