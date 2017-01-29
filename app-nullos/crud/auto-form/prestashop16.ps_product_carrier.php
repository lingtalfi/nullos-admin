<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_carrier", ['id_product', 'id_carrier_reference', 'id_shop']);



$form->labels = [
    "id_product" => "id product",
    "id_carrier_reference" => "id carrier reference",
    "id_shop" => "id shop",
];


$form->title = "Ps product carrier";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_carrier_reference")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
