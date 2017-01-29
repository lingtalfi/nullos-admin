<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_timezone", ['id_timezone']);



$form->labels = [
    "id_timezone" => "id timezone",
    "name" => "name",
];


$form->title = "Ps timezone";


$form->addControl("name")->type("text");


$form->display();
