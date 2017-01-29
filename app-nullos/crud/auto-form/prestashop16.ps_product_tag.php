<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_tag", ['id_product', 'id_tag']);



$form->labels = [
    "id_product" => "id product",
    "id_tag" => "id tag",
    "id_lang" => "id lang",
];


$form->title = "Ps product tag";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_tag")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value(0);


$form->display();
