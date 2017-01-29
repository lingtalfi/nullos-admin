<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_country", ['id_country']);



$form->labels = [
    "id_country" => "id country",
    "id_zone" => "id zone",
    "id_currency" => "id currency",
    "iso_code" => "iso code",
    "call_prefix" => "call prefix",
    "active" => "active",
    "contains_states" => "contains states",
    "need_identification_number" => "need identification number",
    "need_zip_code" => "need zip code",
    "zip_code_format" => "zip code format",
    "display_tax_label" => "display tax label",
];


$form->title = "Ps country";


$form->addControl("id_zone")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value("0");
$form->addControl("iso_code")->type("text");
$form->addControl("call_prefix")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("contains_states")->type("text")
->value("0");
$form->addControl("need_identification_number")->type("text")
->value("0");
$form->addControl("need_zip_code")->type("text")
->value("1");
$form->addControl("zip_code_format")->type("text")
->value("");
$form->addControl("display_tax_label")->type("text")
->value(0);


$form->display();
