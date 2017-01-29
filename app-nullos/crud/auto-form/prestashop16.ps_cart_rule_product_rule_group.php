<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_product_rule_group", ['id_product_rule_group']);



$form->labels = [
    "id_product_rule_group" => "id product rule group",
    "id_cart_rule" => "id cart rule",
    "quantity" => "quantity",
];


$form->title = "Ps cart rule product rule group";


$form->addControl("id_cart_rule")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value("1");


$form->display();
