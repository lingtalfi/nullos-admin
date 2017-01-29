<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_lang", ['id_cart_rule', 'id_lang']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps cart rule lang";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
