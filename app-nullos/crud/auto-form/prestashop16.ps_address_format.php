<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_address_format", ['id_country']);



$form->labels = [
    "id_country" => "id country",
    "format" => "format",
];


$form->title = "Ps address format";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("format")->type("text")
->value("");


$form->display();
