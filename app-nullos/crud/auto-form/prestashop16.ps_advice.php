<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_advice", ['id_advice']);



$form->labels = [
    "id_advice" => "id advice",
    "id_ps_advice" => "id ps advice",
    "id_tab" => "id tab",
    "ids_tab" => "ids tab",
    "validated" => "validated",
    "hide" => "hide",
    "location" => "location",
    "selector" => "selector",
    "start_day" => "start day",
    "stop_day" => "stop day",
    "weight" => "weight",
];


$form->title = "Ps advice";


$form->addControl("id_ps_advice")->type("text")
->value(0);
$form->addControl("id_tab")->type("text")
->value(0);
$form->addControl("ids_tab")->type("message");
$form->addControl("validated")->type("text")
->value("0");
$form->addControl("hide")->type("text")
->value("0");
$form->addControl("location")->type("radioList", ['after','before']);
$form->addControl("selector")->type("text");
$form->addControl("start_day")->type("text")
->value("0");
$form->addControl("stop_day")->type("text")
->value("0");
$form->addControl("weight")->type("text")
->value("1");


$form->display();
