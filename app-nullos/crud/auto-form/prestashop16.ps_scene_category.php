<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_scene_category", ['id_scene', 'id_category']);



$form->labels = [
    "id_scene" => "id scene",
    "id_category" => "id category",
];


$form->title = "Ps scene category";


$form->addControl("id_scene")->type("text")
->value(0);
$form->addControl("id_category")->type("text")
->value(0);


$form->display();
