<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_compare_product", ['id_compare', 'id_product']);



$form->labels = [
    "id_compare" => "id compare",
    "id_product" => "id product",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps compare product";


$form->addControl("id_compare")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();
