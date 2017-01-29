<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_configuration_kpi_lang", ['id_configuration_kpi', 'id_lang']);



$form->labels = [
    "id_configuration_kpi" => "id configuration kpi",
    "id_lang" => "id lang",
    "value" => "value",
    "date_upd" => "date upd",
];


$form->title = "Ps configuration kpi lang";


$form->addControl("id_configuration_kpi")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("value")->type("message");
$form->addControl("date_upd")->type("date6");


$form->display();
