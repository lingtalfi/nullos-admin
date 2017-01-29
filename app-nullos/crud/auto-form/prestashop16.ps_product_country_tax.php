<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_country_tax", ['id_product', 'id_country']);



$form->labels = [
    "id_product" => "id product",
    "id_country" => "id country",
    "id_tax" => "id tax",
];


$form->title = "Ps product country tax";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_tax")->type("text")
->value(0);


$form->display();
