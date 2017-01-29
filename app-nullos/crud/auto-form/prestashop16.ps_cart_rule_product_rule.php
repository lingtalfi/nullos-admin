<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_product_rule", ['id_product_rule']);



$form->labels = [
    "id_product_rule" => "id product rule",
    "id_product_rule_group" => "id product rule group",
    "type" => "type",
];


$form->title = "Ps cart rule product rule";


$form->addControl("id_product_rule_group")->type("text")
->value(0);
$form->addControl("type")->type("select", ['products','categories','attributes','manufacturers','suppliers']);


$form->display();
