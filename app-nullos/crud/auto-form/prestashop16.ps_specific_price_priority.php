<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_specific_price_priority", ['id_specific_price_priority', 'id_product']);



$form->labels = [
    "id_specific_price_priority" => "id specific price priority",
    "id_product" => "id product",
    "priority" => "priority",
];


$form->title = "Ps specific price priority";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("priority")->type("text");


$form->display();
