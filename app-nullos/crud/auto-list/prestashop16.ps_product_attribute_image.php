<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_attribute,
id_image
';


$query = "select
%s
from prestashop16.ps_product_attribute_image
";


$table = CrudModule::getDataTable("prestashop16.ps_product_attribute_image", $query, $fields, ['id_product_attribute', 'id_image']);

$table->title = "Ps product attribute image";


$table->columnLabels= [
    "id_product_attribute" => "id product attribute",
    "id_image" => "id image",
];


$table->displayTable();
