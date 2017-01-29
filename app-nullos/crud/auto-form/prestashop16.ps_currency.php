<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_currency", ['id_currency']);



$form->labels = [
    "id_currency" => "id currency",
    "name" => "name",
    "iso_code" => "iso code",
    "iso_code_num" => "iso code num",
    "sign" => "sign",
    "blank" => "blank",
    "format" => "format",
    "decimals" => "decimals",
    "conversion_rate" => "conversion rate",
    "deleted" => "deleted",
    "active" => "active",
];


$form->title = "Ps currency";


$form->addControl("name")->type("text");
$form->addControl("iso_code")->type("text")
->value("0");
$form->addControl("iso_code_num")->type("text")
->value("0");
$form->addControl("sign")->type("text");
$form->addControl("blank")->type("text")
->value("0");
$form->addControl("format")->type("text")
->value("0");
$form->addControl("decimals")->type("text")
->value("1");
$form->addControl("conversion_rate")->type("text");
$form->addControl("deleted")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("1");


$form->display();
