<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attribute_group_shop", ['id_attribute_group', 'id_shop']);



$form->labels = [
    "id_attribute_group" => "id attribute group",
    "id_shop" => "id shop",
];


$form->title = "Ps attribute group shop";


$form->addControl("id_attribute_group")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
