<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_category,
id_parent,
level_depth,
active,
date_add,
date_upd,
position
';


$query = "select
%s
from prestashop16.ps_cms_category
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_category", $query, $fields, ['id_cms_category']);

$table->title = "Ps cms category";


$table->columnLabels= [
    "id_cms_category" => "id cms category",
    "id_parent" => "id parent",
    "level_depth" => "level depth",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "position" => "position",
];


$table->hiddenColumns = [
    "id_cms_category",
];


$table->displayTable();
