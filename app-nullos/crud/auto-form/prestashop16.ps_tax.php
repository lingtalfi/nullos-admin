<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tax", ['id_tax']);



$form->labels = [
    "id_tax" => "id tax",
    "rate" => "rate",
    "active" => "active",
    "deleted" => "deleted",
];


$form->title = "Ps tax";


$form->addControl("rate")->type("text");
$form->addControl("active")->type("text")
->value("1");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();
