<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_stock_mvt", ['id_stock_mvt']);



$form->labels = [
    "id_stock_mvt" => "id stock mvt",
    "id_stock" => "id stock",
    "id_order" => "id order",
    "id_supply_order" => "id supply order",
    "id_stock_mvt_reason" => "id stock mvt reason",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "physical_quantity" => "physical quantity",
    "date_add" => "date add",
    "sign" => "sign",
    "price_te" => "price te",
    "last_wa" => "last wa",
    "current_wa" => "current wa",
    "referer" => "referer",
];


$form->title = "Ps stock mvt";


$form->addControl("id_stock")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_supply_order")->type("text")
->value(0);
$form->addControl("id_stock_mvt_reason")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("employee_lastname")->type("text")
->value("");
$form->addControl("employee_firstname")->type("text")
->value("");
$form->addControl("physical_quantity")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");
$form->addControl("sign")->type("text")
->value("1");
$form->addControl("price_te")->type("text")
->value("0.000000");
$form->addControl("last_wa")->type("text")
->value("0.000000");
$form->addControl("current_wa")->type("text")
->value("0.000000");
$form->addControl("referer")->type("text");


$form->display();
