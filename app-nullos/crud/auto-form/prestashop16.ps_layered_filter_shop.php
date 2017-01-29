<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_filter_shop", ['id_layered_filter', 'id_shop']);



$form->labels = [
    "id_layered_filter" => "id layered filter",
    "id_shop" => "id shop",
];


$form->title = "Ps layered filter shop";


$form->addControl("id_layered_filter")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
