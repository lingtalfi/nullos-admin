<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_stock_available,
id_product,
id_product_attribute,
id_shop,
id_shop_group,
quantity,
depends_on_stock,
out_of_stock
';


$query = "select
%s
from prestashop16.ps_stock_available
";


$table = CrudModule::getDataTable("prestashop16.ps_stock_available", $query, $fields, ['id_stock_available']);

$table->title = "Ps stock available";


$table->columnLabels= [
    "id_stock_available" => "id stock available",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "quantity" => "quantity",
    "depends_on_stock" => "depends on stock",
    "out_of_stock" => "out of stock",
];


$table->hiddenColumns = [
    "id_stock_available",
];


$table->displayTable();
