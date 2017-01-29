<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_product,
id_attribute_group,
id_shop
';


$query = "select
%s
from prestashop16.ps_layered_product_attribute
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_product_attribute", $query, $fields, ['id_attribute', 'id_product', 'id_shop']);

$table->title = "Ps layered product attribute";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_product" => "id product",
    "id_attribute_group" => "id attribute group",
    "id_shop" => "id shop",
];


$table->displayTable();
