<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tab_advice", ['id_tab', 'id_advice']);



$form->labels = [
    "id_tab" => "id tab",
    "id_advice" => "id advice",
];


$form->title = "Ps tab advice";


$form->addControl("id_tab")->type("text")
->value(0);
$form->addControl("id_advice")->type("text")
->value(0);


$form->display();
