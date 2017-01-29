<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_scene_shop", ['id_scene', 'id_shop']);



$form->labels = [
    "id_scene" => "id scene",
    "id_shop" => "id shop",
];


$form->title = "Ps scene shop";


$form->addControl("id_scene")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
