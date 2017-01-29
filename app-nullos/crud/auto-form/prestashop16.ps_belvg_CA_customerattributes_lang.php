<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_belvg_CA_customerattributes_lang", ['id_belvg_customerattributes', 'id_lang']);



$form->labels = [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_lang" => "id lang",
    "name" => "name",
];


$form->title = "Ps belvg CA customerattributes lang";


$form->addControl("id_belvg_customerattributes")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
