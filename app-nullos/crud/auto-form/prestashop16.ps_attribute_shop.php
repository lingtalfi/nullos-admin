<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_shop", ['id_attribute', 'id_shop']);



$form->labels = [
    "id_attribute" => "id attribute",
    "id_shop" => "id shop",
];


$form->title = "Ps attribute shop";


$form->addControl("id_attribute")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
