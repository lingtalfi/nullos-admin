<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_zone_shop", ['id_zone', 'id_shop']);



$form->labels = [
    "id_zone" => "id zone",
    "id_shop" => "id shop",
];


$form->title = "Ps zone shop";


$form->addControl("id_zone")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
