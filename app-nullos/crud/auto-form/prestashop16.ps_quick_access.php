<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_quick_access", ['id_quick_access']);



$form->labels = [
    "id_quick_access" => "id quick access",
    "new_window" => "new window",
    "link" => "link",
];


$form->title = "Ps quick access";


$form->addControl("new_window")->type("text")
->value("0");
$form->addControl("link")->type("text");


$form->display();
