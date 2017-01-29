<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_manufacturer_shop", ['id_manufacturer', 'id_shop']);



$form->labels = [
    "id_manufacturer" => "id manufacturer",
    "id_shop" => "id shop",
];


$form->title = "Ps manufacturer shop";


$form->addControl("id_manufacturer")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
