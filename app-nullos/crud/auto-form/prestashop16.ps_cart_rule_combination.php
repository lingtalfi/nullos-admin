<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_combination", ['id_cart_rule_1', 'id_cart_rule_2']);



$form->labels = [
    "id_cart_rule_1" => "id cart rule 1",
    "id_cart_rule_2" => "id cart rule 2",
];


$form->title = "Ps cart rule combination";


$form->addControl("id_cart_rule_1")->type("text")
->value(0);
$form->addControl("id_cart_rule_2")->type("text")
->value(0);


$form->display();
