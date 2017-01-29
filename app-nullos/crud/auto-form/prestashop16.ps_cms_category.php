<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_category", ['id_cms_category']);



$form->labels = [
    "id_cms_category" => "id cms category",
    "id_parent" => "id parent",
    "level_depth" => "level depth",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "position" => "position",
];


$form->title = "Ps cms category";


$form->addControl("id_parent")->type("text")
->value(0);
$form->addControl("level_depth")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("position")->type("text")
->value("0");


$form->display();
