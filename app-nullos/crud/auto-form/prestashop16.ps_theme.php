<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_theme", ['id_theme']);



$form->labels = [
    "id_theme" => "id theme",
    "name" => "name",
    "directory" => "directory",
    "responsive" => "responsive",
    "default_left_column" => "default left column",
    "default_right_column" => "default right column",
    "product_per_page" => "product per page",
];


$form->title = "Ps theme";


$form->addControl("name")->type("text");
$form->addControl("directory")->type("text");
$form->addControl("responsive")->type("text")
->value("0");
$form->addControl("default_left_column")->type("text")
->value("0");
$form->addControl("default_right_column")->type("text")
->value("0");
$form->addControl("product_per_page")->type("text")
->value(0);


$form->display();
