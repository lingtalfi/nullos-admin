<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_alias", ['id_alias']);



$form->labels = [
    "id_alias" => "id alias",
    "alias" => "alias",
    "search" => "search",
    "active" => "active",
];


$form->title = "Ps alias";


$form->addControl("alias")->type("text");
$form->addControl("search")->type("text");
$form->addControl("active")->type("text")
->value("1");


$form->display();
