<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_block_page", ['id_cms_block_page']);



$form->labels = [
    "id_cms_block_page" => "id cms block page",
    "id_cms_block" => "id cms block",
    "id_cms" => "id cms",
    "is_category" => "is category",
];


$form->title = "Ps cms block page";


$form->addControl("id_cms_block")->type("text")
->value(0);
$form->addControl("id_cms")->type("text")
->value(0);
$form->addControl("is_category")->type("text")
->value(0);


$form->display();
