<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_compare", ['id_compare']);



$form->labels = [
    "id_compare" => "id compare",
    "id_customer" => "id customer",
];


$form->title = "Ps compare";


$form->addControl("id_customer")->type("text")
->value(0);


$form->display();
