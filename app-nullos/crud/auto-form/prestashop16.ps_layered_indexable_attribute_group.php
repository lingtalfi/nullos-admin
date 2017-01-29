<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_indexable_attribute_group", ['id_attribute_group']);



$form->labels = [
    "id_attribute_group" => "id attribute group",
    "indexable" => "indexable",
];


$form->title = "Ps layered indexable attribute group";


$form->addControl("id_attribute_group")->type("text")
->value(0);
$form->addControl("indexable")->type("text")
->value("0");


$form->display();
