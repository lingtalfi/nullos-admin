<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute_impact,
id_product,
id_attribute,
weight,
price
';


$query = "select
%s
from prestashop16.ps_attribute_impact
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_impact", $query, $fields, ['id_attribute_impact']);

$table->title = "Ps attribute impact";


$table->columnLabels= [
    "id_attribute_impact" => "id attribute impact",
    "id_product" => "id product",
    "id_attribute" => "id attribute",
    "weight" => "weight",
    "price" => "price",
];


$table->hiddenColumns = [
    "id_attribute_impact",
];


$table->displayTable();
