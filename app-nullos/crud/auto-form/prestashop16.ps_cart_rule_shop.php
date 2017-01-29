<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_shop", ['id_cart_rule', 'id_shop']);



$form->labels = [
    "id_cart_rule" => "id cart rule",
    "id_shop" => "id shop",
];


$form->title = "Ps cart rule shop";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
