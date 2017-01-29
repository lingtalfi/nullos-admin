<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_smarty_cache", ['id_smarty_cache']);



$form->labels = [
    "id_smarty_cache" => "id smarty cache",
    "name" => "name",
    "cache_id" => "cache",
    "modified" => "modified",
    "content" => "content",
];


$form->title = "Ps smarty cache";


$form->addControl("id_smarty_cache")->type("text");
$form->addControl("name")->type("text");
$form->addControl("cache_id")->type("text");
$form->addControl("modified")->type("text")
->value("CURRENT_TIMESTAMP");
$form->addControl("content")->type("text");


$form->display();
