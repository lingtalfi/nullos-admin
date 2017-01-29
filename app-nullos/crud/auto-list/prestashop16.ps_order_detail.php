<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_detail,
id_order,
id_order_invoice,
id_warehouse,
id_shop,
product_id,
product_attribute_id,
product_name,
product_quantity,
product_quantity_in_stock,
product_quantity_refunded,
product_quantity_return,
product_quantity_reinjected,
product_price,
reduction_percent,
reduction_amount,
reduction_amount_tax_incl,
reduction_amount_tax_excl,
group_reduction,
product_quantity_discount,
product_ean13,
product_upc,
product_reference,
product_supplier_reference,
product_weight,
id_tax_rules_group,
tax_computation_method,
tax_name,
tax_rate,
ecotax,
ecotax_tax_rate,
discount_quantity_applied,
download_hash,
download_nb,
download_deadline,
total_price_tax_incl,
total_price_tax_excl,
unit_price_tax_incl,
unit_price_tax_excl,
total_shipping_price_tax_incl,
total_shipping_price_tax_excl,
purchase_supplier_price,
original_product_price,
original_wholesale_price
';


$query = "select
%s
from prestashop16.ps_order_detail
";


$table = CrudModule::getDataTable("prestashop16.ps_order_detail", $query, $fields, ['id_order_detail']);

$table->title = "Ps order detail";


$table->columnLabels= [
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


$table->hiddenColumns = [
    "id_order_detail",
];


$table->displayTable();
