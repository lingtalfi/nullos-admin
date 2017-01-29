<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_word,
weight
';


$query = "select
%s
from prestashop16.ps_search_index
";


$table = CrudModule::getDataTable("prestashop16.ps_search_index", $query, $fields, ['id_word', 'id_product']);

$table->title = "Ps search index";


$table->columnLabels= [
    "id_product" => "id product",
    "id_word" => "id word",
    "weight" => "weight",
];


$table->displayTable();
