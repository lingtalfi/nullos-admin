<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tax_rule", ['id_tax_rule']);



$form->labels = [
    "id_tax_rule" => "id tax rule",
    "id_tax_rules_group" => "id tax rules group",
    "id_country" => "id country",
    "id_state" => "id state",
    "zipcode_from" => "zipcode from",
    "zipcode_to" => "zipcode to",
    "id_tax" => "id tax",
    "behavior" => "behavior",
    "description" => "description",
];


$form->title = "Ps tax rule";


$form->addControl("id_tax_rules_group")->type("text")
->value(0);
$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_state")->type("text")
->value(0);
$form->addControl("zipcode_from")->type("text");
$form->addControl("zipcode_to")->type("text");
$form->addControl("id_tax")->type("text")
->value(0);
$form->addControl("behavior")->type("text")
->value(0);
$form->addControl("description")->type("text");


$form->display();
