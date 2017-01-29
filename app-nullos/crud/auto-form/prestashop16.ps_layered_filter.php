<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_filter", ['id_layered_filter']);



$form->labels = [
    "id_layered_filter" => "id layered filter",
    "name" => "name",
    "filters" => "filters",
    "n_categories" => "n categories",
    "date_add" => "date add",
];


$form->title = "Ps layered filter";


$form->addControl("name")->type("text");
$form->addControl("filters")->type("message");
$form->addControl("n_categories")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");


$form->display();
