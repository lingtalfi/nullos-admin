<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_supplier,
id_manufacturer,
id_category_default,
id_shop_default,
id_tax_rules_group,
on_sale,
online_only,
ean13,
upc,
ecotax,
quantity,
minimal_quantity,
price,
wholesale_price,
unity,
unit_price_ratio,
additional_shipping_cost,
reference,
supplier_reference,
location,
width,
height,
depth,
weight,
out_of_stock,
quantity_discount,
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
cache_is_pack,
cache_has_attachments,
is_virtual,
cache_default_attribute,
date_add,
date_upd,
advanced_stock_management,
pack_stock_type
';


$query = "select
%s
from prestashop16.ps_product
";


$table = CrudModule::getDataTable("prestashop16.ps_product", $query, $fields, ['id_product']);

$table->title = "Ps product";


$table->columnLabels= [
    "id_product" => "id product",
    "id_supplier" => "id supplier",
    "id_manufacturer" => "id manufacturer",
    "id_category_default" => "id category default",
    "id_shop_default" => "id shop default",
    "id_tax_rules_group" => "id tax rules group",
    "on_sale" => "on sale",
    "online_only" => "online only",
    "ean13" => "ean13",
    "upc" => "upc",
    "ecotax" => "ecotax",
    "quantity" => "quantity",
    "minimal_quantity" => "minimal quantity",
    "price" => "price",
    "wholesale_price" => "wholesale price",
    "unity" => "unity",
    "unit_price_ratio" => "unit price ratio",
    "additional_shipping_cost" => "additional shipping cost",
    "reference" => "reference",
    "supplier_reference" => "supplier reference",
    "location" => "location",
    "width" => "width",
    "height" => "height",
    "depth" => "depth",
    "weight" => "weight",
    "out_of_stock" => "out of stock",
    "quantity_discount" => "quantity discount",
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
    "cache_is_pack" => "cache is pack",
    "cache_has_attachments" => "cache has attachments",
    "is_virtual" => "is virtual",
    "cache_default_attribute" => "cache default attribute",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "advanced_stock_management" => "advanced stock management",
    "pack_stock_type" => "pack stock type",
];


$table->hiddenColumns = [
    "id_product",
];


$table->displayTable();
