<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_page_viewed", ['id_page', 'id_date_range', 'id_shop']);



$form->labels = [
    "id_page" => "id page",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_date_range" => "id date range",
    "counter" => "counter",
];


$form->title = "Ps page viewed";


$form->addControl("id_page")->type("text")
->value(0);
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_date_range")->type("text")
->value(0);
$form->addControl("counter")->type("text")
->value(0);


$form->display();
