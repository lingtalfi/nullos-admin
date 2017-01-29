<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_currency,
id_shop,
price_min,
price_max
';


$query = "select
%s
from prestashop16.ps_layered_price_index
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_price_index", $query, $fields, ['id_product', 'id_currency', 'id_shop']);

$table->title = "Ps layered price index";


$table->columnLabels= [
    "id_product" => "id product",
    "id_currency" => "id currency",
    "id_shop" => "id shop",
    "price_min" => "price min",
    "price_max" => "price max",
];


$table->displayTable();
