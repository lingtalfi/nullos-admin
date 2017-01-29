<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_scene,
active
';


$query = "select
%s
from prestashop16.ps_scene
";


$table = CrudModule::getDataTable("prestashop16.ps_scene", $query, $fields, ['id_scene']);

$table->title = "Ps scene";


$table->columnLabels= [
    "id_scene" => "id scene",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_scene",
];


$table->displayTable();
