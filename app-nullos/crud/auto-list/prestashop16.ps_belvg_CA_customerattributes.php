<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_belvg_customerattributes,
code,
type,
is_enabled,
sort_order,
display_on,
required,
validation,
values,
groups,
max_text_length,
file_size,
file_extensions,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_belvg_CA_customerattributes
";


$table = CrudModule::getDataTable("prestashop16.ps_belvg_CA_customerattributes", $query, $fields, ['id_belvg_customerattributes']);

$table->title = "Ps belvg CA customerattributes";


$table->columnLabels= [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "code" => "code",
    "type" => "type",
    "is_enabled" => "is enabled",
    "sort_order" => "sort order",
    "display_on" => "display on",
    "required" => "required",
    "validation" => "validation",
    "values" => "values",
    "groups" => "groups",
    "max_text_length" => "max text length",
    "file_size" => "file size",
    "file_extensions" => "file extensions",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_belvg_customerattributes",
];


$n = 30;
$table->setTransformer('values', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('groups', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('file_extensions', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
