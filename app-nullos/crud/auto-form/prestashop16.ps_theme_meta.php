<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_theme_meta", ['id_theme_meta']);



$form->labels = [
    "id_theme_meta" => "id theme meta",
    "id_theme" => "id theme",
    "id_meta" => "id meta",
    "left_column" => "left column",
    "right_column" => "right column",
];


$form->title = "Ps theme meta";


$form->addControl("id_theme")->type("text")
->value(0);
$form->addControl("id_meta")->type("text")
->value(0);
$form->addControl("left_column")->type("text")
->value("1");
$form->addControl("right_column")->type("text")
->value("1");


$form->display();
