<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tab,
id_parent,
class_name,
module,
position,
active,
hide_host_mode
';


$query = "select
%s
from prestashop16.ps_tab
";


$table = CrudModule::getDataTable("prestashop16.ps_tab", $query, $fields, ['id_tab']);

$table->title = "Ps tab";


$table->columnLabels= [
    "id_tab" => "id tab",
    "id_parent" => "id parent",
    "class_name" => "class name",
    "module" => "module",
    "position" => "position",
    "active" => "active",
    "hide_host_mode" => "hide host mode",
];


$table->hiddenColumns = [
    "id_tab",
];


$table->displayTable();
