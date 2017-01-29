<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_country", ['id_cart_rule', 'id_country']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_country" => "id country",
];


$form->title = "Ps cart rule country";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_country")->type("text")
->value(0);


$form->display();
