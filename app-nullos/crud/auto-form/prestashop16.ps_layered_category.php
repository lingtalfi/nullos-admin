<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_category", ['id_layered_category']);



$form->labels = [
    "id_layered_category" => "id layered category",
    "id_shop" => "id shop",
    "id_category" => "id category",
    "id_value" => "id value",
    "type" => "type",
    "position" => "position",
    "filter_type" => "filter type",
    "filter_show_limit" => "filter show limit",
];


$form->title = "Ps layered category";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_category")->type("text")
->value(0);
$form->addControl("id_value")->type("text")
->value("0");
$form->addControl("type")->type("select", ['category','id_feature','id_attribute_group','quantity','condition','manufacturer','weight','price']);
$form->addControl("position")->type("text")
->value(0);
$form->addControl("filter_type")->type("text")
->value("0");
$form->addControl("filter_show_limit")->type("text")
->value("0");


$form->display();
