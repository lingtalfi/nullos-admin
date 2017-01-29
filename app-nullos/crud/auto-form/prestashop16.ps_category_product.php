<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_category_product", ['id_category', 'id_product']);



$form->labels = [
    "id_category" => "id category",
    "id_product" => "id product",
    "position" => "position",
];


$form->title = "Ps category product";


$form->addControl("id_category")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value("0");


$form->display();
