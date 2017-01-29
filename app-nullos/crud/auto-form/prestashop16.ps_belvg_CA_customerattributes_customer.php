<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_belvg_CA_customerattributes_customer", ['id_belvg_customerattributes', 'id_customer']);



$form->labels = [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_customer" => "id customer",
    "value" => "value",
];


$form->title = "Ps belvg CA customerattributes customer";


$form->addControl("id_belvg_customerattributes")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("value")->type("message");


$form->display();
