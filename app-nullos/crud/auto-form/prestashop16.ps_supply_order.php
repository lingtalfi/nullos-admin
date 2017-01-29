<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order", ['id_supply_order']);



$form->labels = [
    "id_supply_order" => "id supply order",
    "id_supplier" => "id supplier",
    "supplier_name" => "supplier name",
    "id_lang" => "id lang",
    "id_warehouse" => "id warehouse",
    "id_supply_order_state" => "id supply order state",
    "id_currency" => "id currency",
    "id_ref_currency" => "id ref currency",
    "reference" => "reference",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "date_delivery_expected" => "date delivery expected",
    "total_te" => "total te",
    "total_with_discount_te" => "total with discount te",
    "total_tax" => "total tax",
    "total_ti" => "total ti",
    "discount_rate" => "discount rate",
    "discount_value_te" => "discount value te",
    "is_template" => "is template",
];


$form->title = "Ps supply order";


$form->addControl("id_supplier")->type("text")
->value(0);
$form->addControl("supplier_name")->type("text");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_warehouse")->type("text")
->value(0);
$form->addControl("id_supply_order_state")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_ref_currency")->type("text")
->value(0);
$form->addControl("reference")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("date_delivery_expected")->type("date6");
$form->addControl("total_te")->type("text")
->value("0.000000");
$form->addControl("total_with_discount_te")->type("text")
->value("0.000000");
$form->addControl("total_tax")->type("text")
->value("0.000000");
$form->addControl("total_ti")->type("text")
->value("0.000000");
$form->addControl("discount_rate")->type("text")
->value("0.000000");
$form->addControl("discount_value_te")->type("text")
->value("0.000000");
$form->addControl("is_template")->type("text")
->value("0");


$form->display();
