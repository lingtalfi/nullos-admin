<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_meta", ['id_meta']);



$form->labels = [
    "id_meta" => "id meta",
    "page" => "page",
    "configurable" => "configurable",
];


$form->title = "Ps meta";


$form->addControl("page")->type("text");
$form->addControl("configurable")->type("text")
->value("1");


$form->display();
