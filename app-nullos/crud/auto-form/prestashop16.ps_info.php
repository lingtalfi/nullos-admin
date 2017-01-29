<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_info", ['id_info']);



$form->labels = [
    "id_info" => "id info",
    "id_shop" => "id shop",
];


$form->title = "Ps info";


$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
