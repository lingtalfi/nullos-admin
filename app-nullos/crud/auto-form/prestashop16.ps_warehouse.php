<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_warehouse", ['id_warehouse']);



$form->labels = [
    "id_warehouse" => "id warehouse",
    "id_currency" => "id currency",
    "id_address" => "id address",
    "id_employee" => "id employee",
    "reference" => "reference",
    "name" => "name",
    "management_type" => "management type",
    "deleted" => "deleted",
];


$form->title = "Ps warehouse";


$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_address")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("reference")->type("text");
$form->addControl("name")->type("text");
$form->addControl("management_type")->type("radioList", ['WA','FIFO','LIFO'])
->value("WA");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();
