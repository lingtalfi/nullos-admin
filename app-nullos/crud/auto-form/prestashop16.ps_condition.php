<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_condition", ['id_condition', 'id_ps_condition']);



$form->labels = [
    "id_condition" => "id condition",
    "id_ps_condition" => "id ps condition",
    "type" => "type",
    "request" => "request",
    "operator" => "operator",
    "value" => "value",
    "result" => "result",
    "calculation_type" => "calculation type",
    "calculation_detail" => "calculation detail",
    "validated" => "validated",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps condition";


$form->addControl("id_ps_condition")->type("text")
->value(0);
$form->addControl("type")->type("radioList", ['configuration','install','sql']);
$form->addControl("request")->type("message");
$form->addControl("operator")->type("text");
$form->addControl("value")->type("text");
$form->addControl("result")->type("text");
$form->addControl("calculation_type")->type("radioList", ['hook','time']);
$form->addControl("calculation_detail")->type("text");
$form->addControl("validated")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
