<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_shop,
id_shop_group,
name,
id_category,
id_theme,
active,
deleted
';


$query = "select
%s
from prestashop16.ps_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_shop", $query, $fields, ['id_shop']);

$table->title = "Ps shop";


$table->columnLabels= [
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "name" => "name",
    "id_category" => "id category",
    "id_theme" => "id theme",
    "active" => "active",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_shop",
];


$table->displayTable();
