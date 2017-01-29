<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms", ['id_cms']);



$form->labels = [
    "id_cms" => "id cms",
    "id_cms_category" => "id cms category",
    "position" => "position",
    "active" => "active",
    "indexation" => "indexation",
];


$form->title = "Ps cms";


$form->addControl("id_cms_category")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("indexation")->type("text")
->value("1");


$form->display();
