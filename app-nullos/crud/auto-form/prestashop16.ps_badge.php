<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_badge", ['id_badge']);



$form->labels = [
    "id_badge" => "id badge",
    "id_ps_badge" => "id ps badge",
    "type" => "type",
    "id_group" => "id group",
    "group_position" => "group position",
    "scoring" => "scoring",
    "awb" => "awb",
    "validated" => "validated",
];


$form->title = "Ps badge";


$form->addControl("id_ps_badge")->type("text")
->value(0);
$form->addControl("type")->type("text");
$form->addControl("id_group")->type("text")
->value(0);
$form->addControl("group_position")->type("text")
->value(0);
$form->addControl("scoring")->type("text")
->value(0);
$form->addControl("awb")->type("text")
->value("0");
$form->addControl("validated")->type("text")
->value("0");


$form->display();
