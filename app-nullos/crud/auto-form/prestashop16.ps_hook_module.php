<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_hook_module", ['id_module', 'id_hook', 'id_shop']);



$form->labels = [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_hook" => "id hook",
    "position" => "position",
];


$form->title = "Ps hook module";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_hook")->type("text")
->value(0);
$form->addControl("position")->type("text")
->value(0);


$form->display();
