<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supplier_shop", ['id_supplier', 'id_shop']);



$form->labels = [
    "id_supplier" => "id supplier",
    "id_shop" => "id shop",
];


$form->title = "Ps supplier shop";


$form->addControl("id_supplier")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
