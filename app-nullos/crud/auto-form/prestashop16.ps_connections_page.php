<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_connections_page", ['id_connections', 'id_page', 'time_start']);



$form->labels = [
    "id_connections" => "id connections",
    "id_page" => "id page",
    "time_start" => "time start",
    "time_end" => "time end",
];


$form->title = "Ps connections page";


$form->addControl("id_connections")->type("text")
->value(0);
$form->addControl("id_page")->type("text")
->value(0);
$form->addControl("time_start")->type("date6");
$form->addControl("time_end")->type("date6");


$form->display();
