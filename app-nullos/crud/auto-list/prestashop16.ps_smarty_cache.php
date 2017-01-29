<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_smarty_cache,
name,
cache_id,
modified,
content
';


$query = "select
%s
from prestashop16.ps_smarty_cache
";


$table = CrudModule::getDataTable("prestashop16.ps_smarty_cache", $query, $fields, ['id_smarty_cache']);

$table->title = "Ps smarty cache";


$table->columnLabels= [
    "id_smarty_cache" => "id smarty cache",
    "name" => "name",
    "cache_id" => "cache",
    "modified" => "modified",
    "content" => "content",
];


$table->displayTable();
