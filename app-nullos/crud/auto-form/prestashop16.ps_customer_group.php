<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer_group", ['id_customer', 'id_group']);



$form->labels = [
    "id_customer" => "id customer",
    "id_group" => "id group",
];


$form->title = "Ps customer group";


$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);


$form->display();
