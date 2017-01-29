<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_condition_advice", ['id_condition', 'id_advice']);



$form->labels = [
    "id_condition" => "id condition",
    "id_advice" => "id advice",
    "display" => "display",
];


$form->title = "Ps condition advice";


$form->addControl("id_condition")->type("text")
->value(0);
$form->addControl("id_advice")->type("text")
->value(0);
$form->addControl("display")->type("text")
->value("0");


$form->display();
