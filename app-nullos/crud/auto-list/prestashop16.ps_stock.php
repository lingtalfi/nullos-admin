<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_stock,
id_warehouse,
id_product,
id_product_attribute,
reference,
ean13,
upc,
physical_quantity,
usable_quantity,
price_te
';


$query = "select
%s
from prestashop16.ps_stock
";


$table = CrudModule::getDataTable("prestashop16.ps_stock", $query, $fields, ['id_stock']);

$table->title = "Ps stock";


$table->columnLabels= [
    "id_stock" => "id stock",
    "id_warehouse" => "id warehouse",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "reference" => "reference",
    "ean13" => "ean13",
    "upc" => "upc",
    "physical_quantity" => "physical quantity",
    "usable_quantity" => "usable quantity",
    "price_te" => "price te",
];


$table->hiddenColumns = [
    "id_stock",
];


$table->displayTable();
