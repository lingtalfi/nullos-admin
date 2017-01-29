<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_smarty_lazy_cache", ['template_hash', 'cache_id', 'compile_id']);



$form->labels = [
    "template_hash" => "template hash",
    "cache_id" => "cache",
    "compile_id" => "compile",
    "filepath" => "filepath",
    "last_update" => "last update",
];


$form->title = "Ps smarty lazy cache";


$form->addControl("template_hash")->type("text")
->value("")
->addConstraint("required");
$form->addControl("cache_id")->type("text")
->value("");
$form->addControl("compile_id")->type("text")
->value("");
$form->addControl("filepath")->type("text")
->value("");
$form->addControl("last_update")->type("date6")
->value("0000-00-00 00:00:00");


$form->display();
