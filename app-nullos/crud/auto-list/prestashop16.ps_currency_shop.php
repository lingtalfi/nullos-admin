<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_currency,
id_shop,
conversion_rate
';


$query = "select
%s
from prestashop16.ps_currency_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_currency_shop", $query, $fields, ['id_currency', 'id_shop']);

$table->title = "Ps currency shop";


$table->columnLabels= [
    "id_currency" => "id currency",
    "id_shop" => "id shop",
    "conversion_rate" => "conversion rate",
];


$table->displayTable();
