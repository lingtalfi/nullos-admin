<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_condition_badge", ['id_condition', 'id_badge']);



$form->labels = [
    "id_condition" => "id condition",
    "id_badge" => "id badge",
];


$form->title = "Ps condition badge";


$form->addControl("id_condition")->type("text")
->value(0);
$form->addControl("id_badge")->type("text")
->value(0);


$form->display();
