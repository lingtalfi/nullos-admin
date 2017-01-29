<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_specific_price_rule_condition_group", ['id_specific_price_rule_condition_group', 'id_specific_price_rule']);



$form->labels = [
    "id_specific_price_rule_condition_group" => "id specific price rule condition group",
    "id_specific_price_rule" => "id specific price rule",
];


$form->title = "Ps specific price rule condition group";


$form->addControl("id_specific_price_rule")->type("text")
->value(0);


$form->display();
