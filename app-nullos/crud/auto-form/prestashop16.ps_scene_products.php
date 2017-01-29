<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_scene_products", ['id_scene', 'id_product', 'x_axis', 'y_axis']);



$form->labels = [
    "id_scene" => "id scene",
    "id_product" => "id product",
    "x_axis" => "x axis",
    "y_axis" => "y axis",
    "zone_width" => "zone width",
    "zone_height" => "zone height",
];


$form->title = "Ps scene products";


$form->addControl("id_scene")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("x_axis")->type("text")
->value(0);
$form->addControl("y_axis")->type("text")
->value(0);
$form->addControl("zone_width")->type("text")
->value(0);
$form->addControl("zone_height")->type("text")
->value(0);


$form->display();
