<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_layered_category,
id_shop,
id_category,
id_value,
type,
position,
filter_type,
filter_show_limit
';


$query = "select
%s
from prestashop16.ps_layered_category
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_category", $query, $fields, ['id_layered_category']);

$table->title = "Ps layered category";


$table->columnLabels= [
    "id_layered_category" => "id layered category",
    "id_shop" => "id shop",
    "id_category" => "id category",
    "id_value" => "id value",
    "type" => "type",
    "position" => "position",
    "filter_type" => "filter type",
    "filter_show_limit" => "filter show limit",
];


$table->hiddenColumns = [
    "id_layered_category",
];


$table->displayTable();
