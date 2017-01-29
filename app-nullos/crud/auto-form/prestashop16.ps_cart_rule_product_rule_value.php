<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_rule_product_rule_value", ['id_product_rule', 'id_item']);



$form->labels = [
    "id_product_rule" => "id product rule",
    "id_item" => "id item",
];


$form->title = "Ps cart rule product rule value";


$form->addControl("id_product_rule")->type("text")
->value(0);
$form->addControl("id_item")->type("text")
->value(0);


$form->display();
