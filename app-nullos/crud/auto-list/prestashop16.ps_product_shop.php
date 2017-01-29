<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_shop,
id_category_default,
id_tax_rules_group,
on_sale,
online_only,
ecotax,
minimal_quantity,
price,
wholesale_price,
unity,
unit_price_ratio,
additional_shipping_cost,
customizable,
uploadable_files,
text_fields,
active,
redirect_type,
id_product_redirected,
available_for_order,
available_date,
condition,
show_price,
indexed,
visibility,
cache_default_attribute,
advanced_stock_management,
date_add,
date_upd,
pack_stock_type
';


$query = "select
%s
from prestashop16.ps_product_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_product_shop", $query, $fields, ['id_product', 'id_shop']);

$table->title = "Ps product shop";


$table->columnLabels= [
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


$table->displayTable();
