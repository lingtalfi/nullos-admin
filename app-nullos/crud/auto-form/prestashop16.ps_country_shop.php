<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_country_shop", ['id_country', 'id_shop']);



$form->labels = [
    "id_country" => "id country",
    "id_shop" => "id shop",
];


$form->title = "Ps country shop";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
