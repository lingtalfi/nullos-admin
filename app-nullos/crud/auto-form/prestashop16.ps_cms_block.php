<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_block", ['id_cms_block']);



$form->labels = [
    "id_cms_block" => "id cms block",
    "id_cms_category" => "id cms category",
    "location" => "location",
    "position" => "position",
    "display_store" => "display store",
];


$form->title = "Ps cms block";


$form->addControl("id_cms_category")->type("text")
->value(0);
$form->addControl("location")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value("0");
$form->addControl("display_store")->type("text")
->value("1");


$form->display();
