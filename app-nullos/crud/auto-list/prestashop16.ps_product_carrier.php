<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_carrier_reference,
id_shop
';


$query = "select
%s
from prestashop16.ps_product_carrier
";


$table = CrudModule::getDataTable("prestashop16.ps_product_carrier", $query, $fields, ['id_product', 'id_carrier_reference', 'id_shop']);

$table->title = "Ps product carrier";


$table->columnLabels= [
    "id_product" => "id product",
    "id_carrier_reference" => "id carrier reference",
    "id_shop" => "id shop",
];


$table->displayTable();
