<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_layered_filter,
name,
filters,
n_categories,
date_add
';


$query = "select
%s
from prestashop16.ps_layered_filter
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_filter", $query, $fields, ['id_layered_filter']);

$table->title = "Ps layered filter";


$table->columnLabels= [
    "id_layered_filter" => "id layered filter",
    "name" => "name",
    "filters" => "filters",
    "n_categories" => "n categories",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_layered_filter",
];


$n = 30;
$table->setTransformer('filters', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
