<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_warehouse_shop", ['id_warehouse', 'id_shop']);



$form->labels = [
    "id_shop" => "id shop",
    "id_warehouse" => "id warehouse",
];


$form->title = "Ps warehouse shop";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_warehouse")->type("text")
->value(0);


$form->display();
