<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order_detail,
id_supply_order,
id_currency,
id_product,
id_product_attribute,
reference,
supplier_reference,
name,
ean13,
upc,
exchange_rate,
unit_price_te,
quantity_expected,
quantity_received,
price_te,
discount_rate,
discount_value_te,
price_with_discount_te,
tax_rate,
tax_value,
price_ti,
tax_value_with_order_discount,
price_with_order_discount_te
';


$query = "select
%s
from prestashop16.ps_supply_order_detail
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order_detail", $query, $fields, ['id_supply_order_detail']);

$table->title = "Ps supply order detail";


$table->columnLabels= [
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


$table->hiddenColumns = [
    "id_supply_order_detail",
];


$table->displayTable();
