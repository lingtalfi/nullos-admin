<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_category_shop", ['id_cms_category', 'id_shop']);



$form->labels = [
    "id_cms_category" => "id cms category",
    "id_shop" => "id shop",
];


$form->title = "Ps cms category shop";


$form->addControl("id_shop")->type("text")
->value(0);


$form->display();
