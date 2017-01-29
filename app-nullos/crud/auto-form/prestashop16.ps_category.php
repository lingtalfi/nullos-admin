<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_category", ['id_category']);



$form->labels = [
    "id_category" => "id category",
    "id_parent" => "id parent",
    "id_shop_default" => "id shop default",
    "level_depth" => "level depth",
    "nleft" => "nleft",
    "nright" => "nright",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "position" => "position",
    "is_root_category" => "is root category",
];


$form->title = "Ps category";


$form->addControl("id_parent")->type("text")
->value(0);
$form->addControl("id_shop_default")->type("text")
->value("1");
$form->addControl("level_depth")->type("text")
->value("0");
$form->addControl("nleft")->type("text")
->value("0");
$form->addControl("nright")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("position")->type("text")
->value("0");
$form->addControl("is_root_category")->type("text")
->value("0");


$form->display();
