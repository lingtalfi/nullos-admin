<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_image_type,
name,
width,
height,
products,
categories,
manufacturers,
suppliers,
scenes,
stores
';


$query = "select
%s
from prestashop16.ps_image_type
";


$table = CrudModule::getDataTable("prestashop16.ps_image_type", $query, $fields, ['id_image_type']);

$table->title = "Ps image type";


$table->columnLabels= [
    "id_image_type" => "id image type",
    "name" => "name",
    "width" => "width",
    "height" => "height",
    "products" => "products",
    "categories" => "categories",
    "manufacturers" => "manufacturers",
    "suppliers" => "suppliers",
    "scenes" => "scenes",
    "stores" => "stores",
];


$table->hiddenColumns = [
    "id_image_type",
];


$table->displayTable();
