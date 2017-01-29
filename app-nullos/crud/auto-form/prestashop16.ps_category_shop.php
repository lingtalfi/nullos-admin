<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_category_shop", ['id_category', 'id_shop']);



$form->labels = [
    "id_category" => "id category",
    "id_shop" => "id shop",
    "position" => "position",
];


$form->title = "Ps category shop";


$form->addControl("id_category")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value("0");


$form->display();
