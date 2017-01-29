<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_tax_lang", ['id_tax', 'id_lang']);



$form->labels = [
    "id_tax" => "id tax",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps tax lang";


$form->addControl("id_tax")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
