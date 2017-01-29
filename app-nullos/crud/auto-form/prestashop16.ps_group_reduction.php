<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_group_reduction", ['id_group_reduction']);



$form->labels = [
    "id_group_reduction" => "id group reduction",
    "id_group" => "id group",
    "id_category" => "id category",
    "reduction" => "reduction",
];


$form->title = "Ps group reduction";


$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("id_category")->type("text")
->value(0);
$form->addControl("reduction")->type("text");


$form->display();
