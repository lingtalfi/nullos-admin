<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_group,
reduction
';


$query = "select
%s
from prestashop16.ps_product_group_reduction_cache
";


$table = CrudModule::getDataTable("prestashop16.ps_product_group_reduction_cache", $query, $fields, ['id_product', 'id_group']);

$table->title = "Ps product group reduction cache";


$table->columnLabels= [
    "id_product" => "id product",
    "id_group" => "id group",
    "reduction" => "reduction",
];


$table->displayTable();
