<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_shop", ['id_product', 'id_shop']);



$form->labels = [
    "id_product" => "id product",
    "id_shop" => "id shop",
    "id_category_default" => "id category default",
    "id_tax_rules_group" => "id tax rules group",
    "on_sale" => "on sale",
    "online_only" => "online only",
    "ecotax" => "ecotax",
    "minimal_quantity" => "minimal quantity",
    "price" => "price",
    "wholesale_price" => "wholesale price",
    "unity" => "unity",
    "unit_price_ratio" => "unit price ratio",
    "additional_shipping_cost" => "additional shipping cost",
    "customizable" => "customizable",
    "uploadable_files" => "uploadable files",
    "text_fields" => "text fields",
    "active" => "active",
    "redirect_type" => "redirect type",
    "id_product_redirected" => "id product redirected",
    "available_for_order" => "available for order",
    "available_date" => "available date",
    "condition" => "condition",
    "show_price" => "show price",
    "indexed" => "indexed",
    "visibility" => "visibility",
    "cache_default_attribute" => "cache default attribute",
    "advanced_stock_management" => "advanced stock management",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "pack_stock_type" => "pack stock type",
];


$form->title = "Ps product shop";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("id_category_default")->type("text")
->value(0);
$form->addControl("id_tax_rules_group")->type("text")
->value(0);
$form->addControl("on_sale")->type("text")
->value("0");
$form->addControl("online_only")->type("text")
->value("0");
$form->addControl("ecotax")->type("text")
->value("0.000000");
$form->addControl("minimal_quantity")->type("text")
->value("1");
$form->addControl("price")->type("text")
->value("0.000000");
$form->addControl("wholesale_price")->type("text")
->value("0.000000");
$form->addControl("unity")->type("text");
$form->addControl("unit_price_ratio")->type("text")
->value("0.000000");
$form->addControl("additional_shipping_cost")->type("text")
->value("0.00");
$form->addControl("customizable")->type("text")
->value("0");
$form->addControl("uploadable_files")->type("text")
->value("0");
$form->addControl("text_fields")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("redirect_type")->type("select", ['','404','301','302'])
->value("");
$form->addControl("id_product_redirected")->type("text")
->value("0");
$form->addControl("available_for_order")->type("text")
->value("1");
$form->addControl("available_date")->type("date3")
->value("0000-00-00");
$form->addControl("condition")->type("radioList", ['new','used','refurbished'])
->value("new");
$form->addControl("show_price")->type("text")
->value("1");
$form->addControl("indexed")->type("text")
->value("0");
$form->addControl("visibility")->type("select", ['both','catalog','search','none'])
->value("both");
$form->addControl("cache_default_attribute")->type("text")
->value(0);
$form->addControl("advanced_stock_management")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("pack_stock_type")->type("text")
->value("3");


$form->display();
