<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_risk_lang", ['id_risk', 'id_lang']);



$form->labels = [
    "id_risk" => "id risk",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps risk lang";


$form->addControl("id_risk")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
