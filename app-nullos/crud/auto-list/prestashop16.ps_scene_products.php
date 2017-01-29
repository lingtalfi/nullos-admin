<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_scene,
id_product,
x_axis,
y_axis,
zone_width,
zone_height
';


$query = "select
%s
from prestashop16.ps_scene_products
";


$table = CrudModule::getDataTable("prestashop16.ps_scene_products", $query, $fields, ['id_scene', 'id_product', 'x_axis', 'y_axis']);

$table->title = "Ps scene products";


$table->columnLabels= [
    "id_scene" => "id scene",
    "id_product" => "id product",
    "x_axis" => "x axis",
    "y_axis" => "y axis",
    "zone_width" => "zone width",
    "zone_height" => "zone height",
];


$table->displayTable();
