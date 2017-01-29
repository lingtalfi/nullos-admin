<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_scene,
id_shop
';


$query = "select
%s
from prestashop16.ps_scene_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_scene_shop", $query, $fields, ['id_scene', 'id_shop']);

$table->title = "Ps scene shop";


$table->columnLabels= [
    "id_scene" => "id scene",
    "id_shop" => "id shop",
];


$table->displayTable();
