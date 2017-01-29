<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_store_shop", ['id_store', 'id_shop']);



$form->labels = [
    "id_store" => "id store",
    "id_shop" => "id shop",
];


$form->title = "Ps store shop";


$form->addControl("id_store")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
