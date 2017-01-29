<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_page_type", ['id_page_type']);



$form->labels = [
    "id_page_type" => "id page type",
    "name" => "name",
];


$form->title = "Ps page type";


$form->addControl("name")->type("text");


$form->display();
