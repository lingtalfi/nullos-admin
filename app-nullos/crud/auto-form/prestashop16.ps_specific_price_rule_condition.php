<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_specific_price_rule_condition", ['id_specific_price_rule_condition']);



$form->labels = [
    "id_specific_price_rule_condition" => "id specific price rule condition",
    "id_specific_price_rule_condition_group" => "id specific price rule condition group",
    "type" => "type",
    "value" => "value",
];


$form->title = "Ps specific price rule condition";


$form->addControl("id_specific_price_rule_condition_group")->type("text")
->value(0);
$form->addControl("type")->type("text");
$form->addControl("value")->type("text");


$form->display();
