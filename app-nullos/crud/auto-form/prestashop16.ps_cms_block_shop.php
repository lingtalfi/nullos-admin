<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_block_shop", ['id_cms_block', 'id_shop']);



$form->labels = [
    "id_cms_block" => "id cms block",
    "id_shop" => "id shop",
];


$form->title = "Ps cms block shop";


$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
