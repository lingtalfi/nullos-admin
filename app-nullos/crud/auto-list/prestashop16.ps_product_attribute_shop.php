<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_product_attribute,
id_shop,
wholesale_price,
price,
ecotax,
weight,
unit_price_impact,
default_on,
minimal_quantity,
available_date
';


$query = "select
%s
from prestashop16.ps_product_attribute_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_product_attribute_shop", $query, $fields, ['id_product_attribute', 'id_shop']);

$table->title = "Ps product attribute shop";


$table->columnLabels= [
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_shop" => "id shop",
    "wholesale_price" => "wholesale price",
    "price" => "price",
    "ecotax" => "ecotax",
    "weight" => "weight",
    "unit_price_impact" => "unit price impact",
    "default_on" => "default on",
    "minimal_quantity" => "minimal quantity",
    "available_date" => "available date",
];


$table->displayTable();
