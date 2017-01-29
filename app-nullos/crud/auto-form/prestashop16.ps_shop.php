<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_shop", ['id_shop']);



$form->labels = [
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "name" => "name",
    "id_category" => "id category",
    "id_theme" => "id theme",
    "active" => "active",
    "deleted" => "deleted",
];


$form->title = "Ps shop";


$form->addControl("id_shop_group")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("id_category")->type("text")
->value("1");
$form->addControl("id_theme")->type("text")
->value(0);
$form->addControl("active")->type("text")
->value("1");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();
