<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute", ['id_attribute']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_attribute_group" => "id attribute group",
    "color" => "color",
    "position" => "position",
];


$form->title = "Ps attribute";


$form->addControl("id_attribute_group")->type("text")
->value(0);
$form->addControl("color")->type("text");
$form->addControl("position")->type("text")
->value("0");


$form->display();
