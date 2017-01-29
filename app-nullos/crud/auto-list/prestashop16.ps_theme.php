<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_theme,
name,
directory,
responsive,
default_left_column,
default_right_column,
product_per_page
';


$query = "select
%s
from prestashop16.ps_theme
";


$table = CrudModule::getDataTable("prestashop16.ps_theme", $query, $fields, ['id_theme']);

$table->title = "Ps theme";


$table->columnLabels= [
    "id_theme" => "id theme",
    "name" => "name",
    "directory" => "directory",
    "responsive" => "responsive",
    "default_left_column" => "default left column",
    "default_right_column" => "default right column",
    "product_per_page" => "product per page",
];


$table->hiddenColumns = [
    "id_theme",
];


$table->displayTable();
