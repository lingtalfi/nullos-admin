<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_country,
id_tax
';


$query = "select
%s
from prestashop16.ps_product_country_tax
";


$table = CrudModule::getDataTable("prestashop16.ps_product_country_tax", $query, $fields, ['id_product', 'id_country']);

$table->title = "Ps product country tax";


$table->columnLabels= [
    "id_product" => "id product",
    "id_country" => "id country",
    "id_tax" => "id tax",
];


$table->displayTable();
