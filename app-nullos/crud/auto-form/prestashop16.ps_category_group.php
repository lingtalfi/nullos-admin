<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_category_group", ['id_category', 'id_group']);



$form->labels = [
    "id_category" => "id category",
    "id_group" => "id group",
];


$form->title = "Ps category group";


$form->addControl("id_category")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);


$form->display();
