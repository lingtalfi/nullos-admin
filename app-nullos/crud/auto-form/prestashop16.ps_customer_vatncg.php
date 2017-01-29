<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer_vatncg", ['id_customer']);



$form->labels = [
    "id_customer" => "id customer",
    "vat" => "vat",
    "statut" => "statut",
];


$form->title = "Ps customer vatncg";


$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("vat")->type("text");
$form->addControl("statut")->type("text")
->value(0);


$form->display();
