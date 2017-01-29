<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_layered_filter,
id_shop
';


$query = "select
%s
from prestashop16.ps_layered_filter_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_filter_shop", $query, $fields, ['id_layered_filter', 'id_shop']);

$table->title = "Ps layered filter shop";


$table->columnLabels= [
    "id_layered_filter" => "id layered filter",
    "id_shop" => "id shop",
];


$table->displayTable();
