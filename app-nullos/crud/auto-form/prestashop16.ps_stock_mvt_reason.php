<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_stock_mvt_reason", ['id_stock_mvt_reason']);



$form->labels = [
    "id_stock_mvt_reason" => "id stock mvt reason",
    "sign" => "sign",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "deleted" => "deleted",
];


$form->title = "Ps stock mvt reason";


$form->addControl("sign")->type("text")
->value("1");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();
