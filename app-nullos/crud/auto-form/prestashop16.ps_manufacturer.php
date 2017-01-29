<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_manufacturer", ['id_manufacturer']);



$form->labels = [
    "id_manufacturer" => "id manufacturer",
    "name" => "name",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
];


$form->title = "Ps manufacturer";


$form->addControl("name")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("active")->type("text")
->value("0");


$form->display();
