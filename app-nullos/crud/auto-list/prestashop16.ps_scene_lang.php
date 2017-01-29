<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_scene,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_scene_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_scene_lang", $query, $fields, ['id_scene', 'id_lang']);

$table->title = "Ps scene lang";


$table->columnLabels= [
    "id_scene" => "id scene",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();
