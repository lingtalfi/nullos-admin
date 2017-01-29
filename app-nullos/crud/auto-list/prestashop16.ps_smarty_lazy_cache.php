<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
template_hash,
cache_id,
compile_id,
filepath,
last_update
';


$query = "select
%s
from prestashop16.ps_smarty_lazy_cache
";


$table = CrudModule::getDataTable("prestashop16.ps_smarty_lazy_cache", $query, $fields, ['template_hash', 'cache_id', 'compile_id']);

$table->title = "Ps smarty lazy cache";


$table->columnLabels= [
    "template_hash" => "template hash",
    "cache_id" => "cache",
    "compile_id" => "compile",
    "filepath" => "filepath",
    "last_update" => "last update",
];


$table->displayTable();
