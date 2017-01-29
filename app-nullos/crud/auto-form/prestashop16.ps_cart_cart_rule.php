<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cart_cart_rule", ['id_cart', 'id_cart_rule']);



$form->labels = [
    "id_cart" => "id cart",
    "id_cart_rule" => "id cart rule",
];


$form->title = "Ps cart cart rule";


$form->addControl("id_cart")->type("text")
->value(0);
$form->addControl("id_cart_rule")->type("text")
->value(0);


$form->display();
