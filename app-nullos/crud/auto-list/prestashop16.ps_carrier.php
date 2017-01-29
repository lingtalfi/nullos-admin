<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_reference,
id_tax_rules_group,
name,
url,
active,
deleted,
shipping_handling,
range_behavior,
is_module,
is_free,
shipping_external,
need_range,
external_module_name,
shipping_method,
position,
max_width,
max_height,
max_depth,
max_weight,
grade
';


$query = "select
%s
from prestashop16.ps_carrier
";


$table = CrudModule::getDataTable("prestashop16.ps_carrier", $query, $fields, ['id_carrier']);

$table->title = "Ps carrier";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_reference" => "id reference",
    "id_tax_rules_group" => "id tax rules group",
    "name" => "name",
    "url" => "url",
    "active" => "active",
    "deleted" => "deleted",
    "shipping_handling" => "shipping handling",
    "range_behavior" => "range behavior",
    "is_module" => "is module",
    "is_free" => "is free",
    "shipping_external" => "shipping external",
    "need_range" => "need range",
    "external_module_name" => "external module name",
    "shipping_method" => "shipping method",
    "position" => "position",
    "max_width" => "max width",
    "max_height" => "max height",
    "max_depth" => "max depth",
    "max_weight" => "max weight",
    "grade" => "grade",
];


$table->hiddenColumns = [
    "id_carrier",
];


$table->displayTable();
