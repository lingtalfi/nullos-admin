<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_specific_price_priority,
id_product,
priority
';


$query = "select
%s
from prestashop16.ps_specific_price_priority
";


$table = CrudModule::getDataTable("prestashop16.ps_specific_price_priority", $query, $fields, ['id_specific_price_priority', 'id_product']);

$table->title = "Ps specific price priority";


$table->columnLabels= [
    "id_specific_price_priority" => "id specific price priority",
    "id_product" => "id product",
    "priority" => "priority",
];


$table->hiddenColumns = [
    "id_specific_price_priority",
];


$table->displayTable();
