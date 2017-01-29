<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_smarty_last_flush", ['type']);



$form->labels = [
    "type" => "type",
    "last_flush" => "last flush",
];


$form->title = "Ps smarty last flush";


$form->addControl("type")->type("radioList", ['compile','template'])
->value("compile");
$form->addControl("last_flush")->type("date6")
->value("0000-00-00 00:00:00");


$form->display();
