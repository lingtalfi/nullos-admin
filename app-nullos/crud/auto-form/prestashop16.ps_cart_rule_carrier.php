<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_carrier", ['id_cart_rule', 'id_carrier']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_carrier" => "id carrier",
];


$form->title = "Ps cart rule carrier";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_carrier")->type("text")
->value(0);


$form->display();
