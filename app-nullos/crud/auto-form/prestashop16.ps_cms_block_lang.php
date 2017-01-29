<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_block_lang", ['id_cms_block', 'id_lang']);



$form->labels = [
    "id_cms_block" => "id cms block",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps cms block lang";


$form->addControl("id_cms_block")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text")
->value("");


$form->display();
