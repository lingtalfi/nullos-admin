<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_download", ['id_product_download']);



$form->labels = [
    "id_product_download" => "id product download",
    "id_product" => "id product",
    "display_filename" => "display filename",
    "filename" => "filename",
    "date_add" => "date add",
    "date_expiration" => "date expiration",
    "nb_days_accessible" => "nb days accessible",
    "nb_downloadable" => "nb downloadable",
    "active" => "active",
    "is_shareable" => "is shareable",
];


$form->title = "Ps product download";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("display_filename")->type("text");
$form->addControl("filename")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_expiration")->type("date6");
$form->addControl("nb_days_accessible")->type("text")
->value(0);
$form->addControl("nb_downloadable")->type("text")
->value("1");
$form->addControl("active")->type("text")
->value("1");
$form->addControl("is_shareable")->type("text")
->value("0");


$form->display();
