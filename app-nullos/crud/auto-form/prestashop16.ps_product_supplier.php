<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_supplier", ['id_product_supplier']);



$form->labels = [
    "id_product_supplier" => "id product supplier",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_supplier" => "id supplier",
    "product_supplier_reference" => "product supplier reference",
    "product_supplier_price_te" => "product supplier price te",
    "id_currency" => "id currency",
];


$form->title = "Ps product supplier";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value("0");
$form->addControl("id_supplier")->type("text")
->value(0);
$form->addControl("product_supplier_reference")->type("text");
$form->addControl("product_supplier_price_te")->type("text")
->value("0.000000");
$form->addControl("id_currency")->type("text")
->value(0);


$form->display();
