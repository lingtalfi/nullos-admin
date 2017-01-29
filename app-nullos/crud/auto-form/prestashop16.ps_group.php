<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_group", ['id_group']);



$form->labels = [
    "id_group" => "id group",
    "reduction" => "reduction",
    "price_display_method" => "price display method",
    "show_prices" => "show prices",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps group";


$form->addControl("reduction")->type("text")
->value("0.00");
$form->addControl("price_display_method")->type("text")
->value("0");
$form->addControl("show_prices")->type("text")
->value("1");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
