<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_warehouse_product_location,
id_product,
id_product_attribute,
id_warehouse,
location
';


$query = "select
%s
from prestashop16.ps_warehouse_product_location
";


$table = CrudModule::getDataTable("prestashop16.ps_warehouse_product_location", $query, $fields, ['id_warehouse_product_location']);

$table->title = "Ps warehouse product location";


$table->columnLabels= [
    "id_warehouse_product_location" => "id warehouse product location",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_warehouse" => "id warehouse",
    "location" => "location",
];


$table->hiddenColumns = [
    "id_warehouse_product_location",
];


$table->displayTable();
