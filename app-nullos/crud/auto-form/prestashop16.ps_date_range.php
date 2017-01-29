<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_date_range", ['id_date_range']);



$form->labels = [
    "id_date_range" => "id date range",
    "time_start" => "time start",
    "time_end" => "time end",
];


$form->title = "Ps date range";


$form->addControl("time_start")->type("date6");
$form->addControl("time_end")->type("date6");


$form->display();
