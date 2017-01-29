<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_sale", ['id_product']);



$form->labels = [
    "id_product" => "id product",
    "quantity" => "quantity",
    "sale_nbr" => "sale nbr",
    "date_upd" => "date upd",
];


$form->title = "Ps product sale";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value("0");
$form->addControl("sale_nbr")->type("text")
->value("0");
$form->addControl("date_upd")->type("date3");


$form->display();
