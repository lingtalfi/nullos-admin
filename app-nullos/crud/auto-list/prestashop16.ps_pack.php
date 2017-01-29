<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_pack,
id_product_item,
id_product_attribute_item,
quantity
';


$query = "select
%s
from prestashop16.ps_pack
";


$table = CrudModule::getDataTable("prestashop16.ps_pack", $query, $fields, ['id_product_pack', 'id_product_item', 'id_product_attribute_item']);

$table->title = "Ps pack";


$table->columnLabels= [
    "id_product_pack" => "id product pack",
    "id_product_item" => "id product item",
    "id_product_attribute_item" => "id product attribute item",
    "quantity" => "quantity",
];


$table->displayTable();
