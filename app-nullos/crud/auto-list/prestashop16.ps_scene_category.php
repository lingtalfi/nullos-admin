<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_scene,
id_category
';


$query = "select
%s
from prestashop16.ps_scene_category
";


$table = CrudModule::getDataTable("prestashop16.ps_scene_category", $query, $fields, ['id_scene', 'id_category']);

$table->title = "Ps scene category";


$table->columnLabels= [
    "id_scene" => "id scene",
    "id_category" => "id category",
];


$table->displayTable();
