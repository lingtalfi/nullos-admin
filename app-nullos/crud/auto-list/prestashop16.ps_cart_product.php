<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart,
id_product,
id_address_delivery,
id_shop,
id_product_attribute,
quantity,
date_add
';


$query = "select
%s
from prestashop16.ps_cart_product
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_product", $query, $fields, ['id_cart', 'id_product', 'id_product_attribute', 'id_address_delivery']);

$table->title = "Ps cart product";


$table->columnLabels= [
    "id_cart" => "id cart",
    "id_product" => "id product",
    "id_address_delivery" => "id address delivery",
    "id_shop" => "id shop",
    "id_product_attribute" => "id product attribute",
    "quantity" => "quantity",
    "date_add" => "date add",
];


$table->displayTable();
