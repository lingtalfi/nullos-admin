<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier_tax_rules_group_shop", ['id_carrier', 'id_tax_rules_group', 'id_shop']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_tax_rules_group" => "id tax rules group",
    "id_shop" => "id shop",
];


$form->title = "Ps carrier tax rules group shop";


$form->addControl("id_carrier")->type("text")
->value(0);
$form->addControl("id_tax_rules_group")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
