<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature_product", ['id_feature', 'id_product']);



$form->labels = [
    "id_feature" => "id feature",
    "id_product" => "id product",
    "id_feature_value" => "id feature value",
];


$form->title = "Ps feature product";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_feature_value")->type("text")
->value(0);


$form->display();
