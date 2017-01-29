<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_lang", ['id_lang']);



$form->labels = [
    "id_lang" => "id lang",
    "name" => "name",
    "active" => "active",
    "iso_code" => "iso code",
    "language_code" => "language code",
    "date_format_lite" => "date format lite",
    "date_format_full" => "date format full",
    "is_rtl" => "is rtl",
];


$form->title = "Ps lang";


$form->addControl("name")->type("text");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("iso_code")->type("text");
$form->addControl("language_code")->type("text");
$form->addControl("date_format_lite")->type("text")
->value("Y-m-d");
$form->addControl("date_format_full")->type("text")
->value("Y-m-d H:i:s");
$form->addControl("is_rtl")->type("text")
->value("0");


$form->display();
