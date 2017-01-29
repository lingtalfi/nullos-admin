<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supplier", ['id_supplier']);



$form->labels = [
    "id_supplier" => "id supplier",
    "name" => "name",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
];


$form->title = "Ps supplier";


$form->addControl("name")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("active")->type("text")
->value("0");


$form->display();
