<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_stock_mvt_reason_lang", ['id_stock_mvt_reason', 'id_lang']);



$form->labels = [
    "id_stock_mvt_reason" => "id stock mvt reason",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps stock mvt reason lang";


$form->addControl("id_stock_mvt_reason")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
