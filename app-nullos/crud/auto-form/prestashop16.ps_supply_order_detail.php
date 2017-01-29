<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order_detail", ['id_supply_order_detail']);



$form->labels = [
    "id_supply_order_detail" => "id supply order detail",
    "id_supply_order" => "id supply order",
    "id_currency" => "id currency",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "reference" => "reference",
    "supplier_reference" => "supplier reference",
    "name" => "name",
    "ean13" => "ean13",
    "upc" => "upc",
    "exchange_rate" => "exchange rate",
    "unit_price_te" => "unit price te",
    "quantity_expected" => "quantity expected",
    "quantity_received" => "quantity received",
    "price_te" => "price te",
    "discount_rate" => "discount rate",
    "discount_value_te" => "discount value te",
    "price_with_discount_te" => "price with discount te",
    "tax_rate" => "tax rate",
    "tax_value" => "tax value",
    "price_ti" => "price ti",
    "tax_value_with_order_discount" => "tax value with order discount",
    "price_with_order_discount_te" => "price with order discount te",
];


$form->title = "Ps supply order detail";


$form->addControl("id_supply_order")->type("text")
->value(0);
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_product_attribute")->type("text")
->value(0);
$form->addControl("reference")->type("text");
$form->addControl("supplier_reference")->type("text");
$form->addControl("name")->type("text");
$form->addControl("ean13")->type("text");
$form->addControl("upc")->type("text");
$form->addControl("exchange_rate")->type("text")
->value("0.000000");
$form->addControl("unit_price_te")->type("text")
->value("0.000000");
$form->addControl("quantity_expected")->type("text")
->value(0);
$form->addControl("quantity_received")->type("text")
->value(0);
$form->addControl("price_te")->type("text")
->value("0.000000");
$form->addControl("discount_rate")->type("text")
->value("0.000000");
$form->addControl("discount_value_te")->type("text")
->value("0.000000");
$form->addControl("price_with_discount_te")->type("text")
->value("0.000000");
$form->addControl("tax_rate")->type("text")
->value("0.000000");
$form->addControl("tax_value")->type("text")
->value("0.000000");
$form->addControl("price_ti")->type("text")
->value("0.000000");
$form->addControl("tax_value_with_order_discount")->type("text")
->value("0.000000");
$form->addControl("price_with_order_discount_te")->type("text")
->value("0.000000");


$form->display();
