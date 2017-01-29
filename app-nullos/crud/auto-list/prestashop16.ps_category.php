<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_category,
id_parent,
id_shop_default,
level_depth,
nleft,
nright,
active,
date_add,
date_upd,
position,
is_root_category
';


$query = "select
%s
from prestashop16.ps_category
";


$table = CrudModule::getDataTable("prestashop16.ps_category", $query, $fields, ['id_category']);

$table->title = "Ps category";


$table->columnLabels= [
    "id_category" => "id category",
    "id_parent" => "id parent",
    "id_shop_default" => "id shop default",
    "level_depth" => "level depth",
    "nleft" => "nleft",
    "nright" => "nright",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "position" => "position",
    "is_root_category" => "is root category",
];


$table->hiddenColumns = [
    "id_category",
];


$table->displayTable();
