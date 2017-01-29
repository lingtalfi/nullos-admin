<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tab", ['id_tab']);



$form->labels = [
    "id_tab" => "id tab",
    "id_parent" => "id parent",
    "class_name" => "class name",
    "module" => "module",
    "position" => "position",
    "active" => "active",
    "hide_host_mode" => "hide host mode",
];


$form->title = "Ps tab";


$form->addControl("id_parent")->type("text")
->value(0);
$form->addControl("class_name")->type("text");
$form->addControl("module")->type("text");
$form->addControl("position")->type("text")
->value(0);
$form->addControl("active")->type("text")
->value("1");
$form->addControl("hide_host_mode")->type("text")
->value("0");


$form->display();
