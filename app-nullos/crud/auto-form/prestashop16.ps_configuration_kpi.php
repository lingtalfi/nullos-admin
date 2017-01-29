<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_configuration_kpi", ['id_configuration_kpi']);



$form->labels = [
    "id_configuration_kpi" => "id configuration kpi",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "name" => "name",
    "value" => "value",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps configuration kpi";


$form->addControl("id_shop_group")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("value")->type("message");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
