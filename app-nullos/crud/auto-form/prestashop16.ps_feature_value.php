<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature_value", ['id_feature_value']);



$form->labels = [
    "id_feature_value" => "id feature value",
    "id_feature" => "id feature",
    "custom" => "custom",
];


$form->title = "Ps feature value";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("custom")->type("text")
->value(0);


$form->display();
