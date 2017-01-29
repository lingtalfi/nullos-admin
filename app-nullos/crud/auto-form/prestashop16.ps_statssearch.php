<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_statssearch", ['id_statssearch']);



$form->labels = [
    "id_statssearch" => "id statssearch",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "keywords" => "keywords",
    "results" => "results",
    "date_add" => "date add",
];


$form->title = "Ps statssearch";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("keywords")->type("text");
$form->addControl("results")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");


$form->display();
