<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_group", ['id_cart_rule', 'id_group']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_group" => "id group",
];


$form->title = "Ps cart rule group";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_group")->type("text")
->value(0);


$form->display();
