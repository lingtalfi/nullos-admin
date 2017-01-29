<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_layered_indexable_feature", ['id_feature']);



$form->labels = [
    "id_feature" => "id feature",
    "indexable" => "indexable",
];


$form->title = "Ps layered indexable feature";


$form->addControl("id_feature")->type("text")
->value(0);
$form->addControl("indexable")->type("text")
->value("0");


$form->display();
