<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_group", ['id_attribute_group']);



$form->labels = [
    "id_attribute_group" => "id attribute group",
    "is_color_group" => "is color group",
    "group_type" => "group type",
    "position" => "position",
];


$form->title = "Ps attribute group";


$form->addControl("is_color_group")->type("text")
->value("0");
$form->addControl("group_type")->type("radioList", ['select','radio','color'])
->value("select");
$form->addControl("position")->type("text")
->value("0");


$form->display();
