<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature", ['id_feature']);



$form->labels = [
    "id_feature" => "id feature",
    "position" => "position",
];


$form->title = "Ps feature";


$form->addControl("position")->type("text")
->value("0");


$form->display();
