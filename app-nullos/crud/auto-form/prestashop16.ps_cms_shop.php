<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_shop", ['id_cms', 'id_shop']);



$form->labels = [
    "id_cms" => "id cms",
    "id_shop" => "id shop",
];


$form->title = "Ps cms shop";


$form->addControl("id_cms")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
