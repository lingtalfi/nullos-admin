<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_modules_perfs", ['id_modules_perfs']);



$form->labels = [
    "id_modules_perfs" => "id modules perfs",
    "session" => "session",
    "module" => "module",
    "method" => "method",
    "time_start" => "time start",
    "time_end" => "time end",
    "memory_start" => "memory start",
    "memory_end" => "memory end",
];


$form->title = "Ps modules perfs";


$form->addControl("session")->type("text")
->value(0);
$form->addControl("module")->type("text");
$form->addControl("method")->type("text");
$form->addControl("time_start")->type("text");
$form->addControl("time_end")->type("text");
$form->addControl("memory_start")->type("text")
->value(0);
$form->addControl("memory_end")->type("text")
->value(0);


$form->display();
