<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_theme,
id_shop,
entity,
id_object
';


$query = "select
%s
from prestashop16.ps_theme_specific
";


$table = CrudModule::getDataTable("prestashop16.ps_theme_specific", $query, $fields, ['id_theme', 'id_shop', 'entity', 'id_object']);

$table->title = "Ps theme specific";


$table->columnLabels= [
    "id_theme" => "id theme",
    "id_shop" => "id shop",
    "entity" => "entity",
    "id_object" => "id object",
];


$table->displayTable();
