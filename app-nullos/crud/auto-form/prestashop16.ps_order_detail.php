<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_detail", ['id_order_detail']);



$form->labels = [
    "id_order_detail" => "id order detail",
    "id_order" => "id order",
    "id_order_invoice" => "id order invoice",
    "id_warehouse" => "id warehouse",
    "id_shop" => "id shop",
    "product_id" => "product",
    "product_attribute_id" => "product attribute",
    "product_name" => "product name",
    "product_quantity" => "product quantity",
    "product_quantity_in_stock" => "product quantity in stock",
    "product_quantity_refunded" => "product quantity refunded",
    "product_quantity_return" => "product quantity return",
    "product_quantity_reinjected" => "product quantity reinjected",
    "product_price" => "product price",
    "reduction_percent" => "reduction percent",
    "reduction_amount" => "reduction amount",
    "reduction_amount_tax_incl" => "reduction amount tax incl",
    "reduction_amount_tax_excl" => "reduction amount tax excl",
    "group_reduction" => "group reduction",
    "product_quantity_discount" => "product quantity discount",
    "product_ean13" => "product ean13",
    "product_upc" => "product upc",
    "product_reference" => "product reference",
    "product_supplier_reference" => "product supplier reference",
    "product_weight" => "product weight",
    "id_tax_rules_group" => "id tax rules group",
    "tax_computation_method" => "tax computation method",
    "tax_name" => "tax name",
    "tax_rate" => "tax rate",
    "ecotax" => "ecotax",
    "ecotax_tax_rate" => "ecotax tax rate",
    "discount_quantity_applied" => "discount quantity applied",
    "download_hash" => "download hash",
    "download_nb" => "download nb",
    "download_deadline" => "download deadline",
    "total_price_tax_incl" => "total price tax incl",
    "total_price_tax_excl" => "total price tax excl",
    "unit_price_tax_incl" => "unit price tax incl",
    "unit_price_tax_excl" => "unit price tax excl",
    "total_shipping_price_tax_incl" => "total shipping price tax incl",
    "total_shipping_price_tax_excl" => "total shipping price tax excl",
    "purchase_supplier_price" => "purchase supplier price",
    "original_product_price" => "original product price",
    "original_wholesale_price" => "original wholesale price",
];


$form->title = "Ps order detail";


$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_order_invoice")->type("text")
->value(0);
$form->addControl("id_warehouse")->type("text")
->value("0");
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("product_id")->type("text")
->value(0);
$form->addControl("product_attribute_id")->type("text")
->value(0);
$form->addControl("product_name")->type("text");
$form->addControl("product_quantity")->type("text")
->value("0");
$form->addControl("product_quantity_in_stock")->type("text")
->value("0");
$form->addControl("product_quantity_refunded")->type("text")
->value("0");
$form->addControl("product_quantity_return")->type("text")
->value("0");
$form->addControl("product_quantity_reinjected")->type("text")
->value("0");
$form->addControl("product_price")->type("text")
->value("0.000000");
$form->addControl("reduction_percent")->type("text")
->value("0.00");
$form->addControl("reduction_amount")->type("text")
->value("0.000000");
$form->addControl("reduction_amount_tax_incl")->type("text")
->value("0.000000");
$form->addControl("reduction_amount_tax_excl")->type("text")
->value("0.000000");
$form->addControl("group_reduction")->type("text")
->value("0.00");
$form->addControl("product_quantity_discount")->type("text")
->value("0.000000");
$form->addControl("product_ean13")->type("text");
$form->addControl("product_upc")->type("text");
$form->addControl("product_reference")->type("text");
$form->addControl("product_supplier_reference")->type("text");
$form->addControl("product_weight")->type("text");
$form->addControl("id_tax_rules_group")->type("text")
->value("0");
$form->addControl("tax_computation_method")->type("text")
->value("0");
$form->addControl("tax_name")->type("text");
$form->addControl("tax_rate")->type("text")
->value("0.000");
$form->addControl("ecotax")->type("text")
->value("0.000000");
$form->addControl("ecotax_tax_rate")->type("text")
->value("0.000");
$form->addControl("discount_quantity_applied")->type("text")
->value("0");
$form->addControl("download_hash")->type("text");
$form->addControl("download_nb")->type("text")
->value("0");
$form->addControl("download_deadline")->type("date6");
$form->addControl("total_price_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_price_tax_excl")->type("text")
->value("0.000000");
$form->addControl("unit_price_tax_incl")->type("text")
->value("0.000000");
$form->addControl("unit_price_tax_excl")->type("text")
->value("0.000000");
$form->addControl("total_shipping_price_tax_incl")->type("text")
->value("0.000000");
$form->addControl("total_shipping_price_tax_excl")->type("text")
->value("0.000000");
$form->addControl("purchase_supplier_price")->type("text")
->value("0.000000");
$form->addControl("original_product_price")->type("text")
->value("0.000000");
$form->addControl("original_wholesale_price")->type("text")
->value("0.000000");


$form->display();
