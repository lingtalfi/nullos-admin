<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_role_lang", ['id_cms_role', 'id_lang', 'id_shop']);



$form->labels = [
    "id_cms_role" => "id cms role",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
];


$form->title = "Ps cms role lang";


$form->addControl("id_cms_role")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("name")->type("text");


$form->display();
