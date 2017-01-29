<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_linksmenutop_lang", ['id_linksmenutop', 'id_lang', 'id_shop', 'label', 'link']);



$form->labels = [
    "id_linksmenutop" => "id linksmenutop",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "label" => "label",
    "link" => "link",
];


$form->title = "Ps linksmenutop lang";


$form->addControl("id_linksmenutop")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("label")->type("text");
$form->addControl("link")->type("text");


$form->display();
