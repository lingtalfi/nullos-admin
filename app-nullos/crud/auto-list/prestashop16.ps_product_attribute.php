<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_attribute,
id_product,
reference,
supplier_reference,
location,
ean13,
upc,
wholesale_price,
price,
ecotax,
quantity,
weight,
unit_price_impact,
default_on,
minimal_quantity,
available_date
';


$query = "select
%s
from prestashop16.ps_product_attribute
";


$table = CrudModule::getDataTable("prestashop16.ps_product_attribute", $query, $fields, ['id_product_attribute']);

$table->title = "Ps product attribute";


$table->columnLabels= [
    "id_product_attribute" => "id product attribute",
    "id_product" => "id product",
    "reference" => "reference",
    "supplier_reference" => "supplier reference",
    "location" => "location",
    "ean13" => "ean13",
    "upc" => "upc",
    "wholesale_price" => "wholesale price",
    "price" => "price",
    "ecotax" => "ecotax",
    "quantity" => "quantity",
    "weight" => "weight",
    "unit_price_impact" => "unit price impact",
    "default_on" => "default on",
    "minimal_quantity" => "minimal quantity",
    "available_date" => "available date",
];


$table->hiddenColumns = [
    "id_product_attribute",
];


$table->displayTable();
