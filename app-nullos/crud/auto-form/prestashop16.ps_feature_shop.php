<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_feature_shop", ['id_feature', 'id_shop']);



$form->labels = [
    "id_feature" => "id feature",
    "id_shop" => "id shop",
];


$form->title = "Ps feature shop";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
