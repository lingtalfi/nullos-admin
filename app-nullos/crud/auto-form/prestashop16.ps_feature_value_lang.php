<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature_value_lang", ['id_feature_value', 'id_lang']);



$form->labels = [
    "id_feature_value" => "id feature value",
    "id_lang" => "id lang",
    "value" => "value",
];


$form->title = "Ps feature value lang";


$form->addControl("id_feature_value")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("value")->type("text");


$form->display();
