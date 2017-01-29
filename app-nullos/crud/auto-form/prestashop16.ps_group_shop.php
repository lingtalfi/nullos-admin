<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_group_shop", ['id_group', 'id_shop']);



$form->labels = [
    "id_group" => "id group",
    "id_shop" => "id shop",
];


$form->title = "Ps group shop";


$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
