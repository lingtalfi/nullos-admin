<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_product_attribute
';


$query = "select
%s
from prestashop16.ps_product_attribute_combination
";


$table = CrudModule::getDataTable("prestashop16.ps_product_attribute_combination", $query, $fields, ['id_attribute', 'id_product_attribute']);

$table->title = "Ps product attribute combination";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_product_attribute" => "id product attribute",
];


$table->displayTable();
