<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_sekeyword", ['id_sekeyword']);



$form->labels = [
    "id_sekeyword" => "id sekeyword",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "keyword" => "keyword",
    "date_add" => "date add",
];


$form->title = "Ps sekeyword";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("keyword")->type("text");
$form->addControl("date_add")->type("date6");


$form->display();
