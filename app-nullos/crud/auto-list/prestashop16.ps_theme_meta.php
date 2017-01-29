<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_theme_meta,
id_theme,
id_meta,
left_column,
right_column
';


$query = "select
%s
from prestashop16.ps_theme_meta
";


$table = CrudModule::getDataTable("prestashop16.ps_theme_meta", $query, $fields, ['id_theme_meta']);

$table->title = "Ps theme meta";


$table->columnLabels= [
    "id_theme_meta" => "id theme meta",
    "id_theme" => "id theme",
    "id_meta" => "id meta",
    "left_column" => "left column",
    "right_column" => "right column",
];


$table->hiddenColumns = [
    "id_theme_meta",
];


$table->displayTable();
