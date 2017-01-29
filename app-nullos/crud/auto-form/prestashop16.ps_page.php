<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_page", ['id_page']);



$form->labels = [
    "id_page" => "id page",
    "id_page_type" => "id page type",
    "id_object" => "id object",
];


$form->title = "Ps page";


$form->addControl("id_page_type")->type("text")
->value(0);
$form->addControl("id_object")->type("text")
->value(0);


$form->display();
