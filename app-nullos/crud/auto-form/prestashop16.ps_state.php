<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_state", ['id_state']);



$form->labels = [
    "id_state" => "id state",
    "id_country" => "id country",
    "id_zone" => "id zone",
    "name" => "name",
    "iso_code" => "iso code",
    "tax_behavior" => "tax behavior",
    "active" => "active",
];


$form->title = "Ps state";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_zone")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("iso_code")->type("text");
$form->addControl("tax_behavior")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");


$form->display();
