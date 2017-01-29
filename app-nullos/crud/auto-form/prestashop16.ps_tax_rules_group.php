<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tax_rules_group", ['id_tax_rules_group']);



$form->labels = [
    "id_tax_rules_group" => "id tax rules group",
    "name" => "name",
    "active" => "active",
    "deleted" => "deleted",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps tax rules group";


$form->addControl("name")->type("text");
$form->addControl("active")->type("text")
->value(0);
$form->addControl("deleted")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
