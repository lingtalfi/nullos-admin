<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_1,
id_product_2
';


$query = "select
%s
from prestashop16.ps_accessory
";


$table = CrudModule::getDataTable("prestashop16.ps_accessory", $query, $fields, ['id_product_1', 'id_product_2']);

$table->title = "Ps accessory";


$table->columnLabels= [
    "id_product_1" => "id product 1",
    "id_product_2" => "id product 2",
];


$table->displayTable();
