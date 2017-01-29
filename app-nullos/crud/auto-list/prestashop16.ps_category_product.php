<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_category,
id_product,
position
';


$query = "select
%s
from prestashop16.ps_category_product
";


$table = CrudModule::getDataTable("prestashop16.ps_category_product", $query, $fields, ['id_category', 'id_product']);

$table->title = "Ps category product";


$table->columnLabels= [
    "id_category" => "id category",
    "id_product" => "id product",
    "position" => "position",
];


$table->displayTable();
