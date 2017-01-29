<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_shop_group,
name,
share_customer,
share_order,
share_stock,
active,
deleted
';


$query = "select
%s
from prestashop16.ps_shop_group
";


$table = CrudModule::getDataTable("prestashop16.ps_shop_group", $query, $fields, ['id_shop_group']);

$table->title = "Ps shop group";


$table->columnLabels= [
    "id_shop_group" => "id shop group",
    "name" => "name",
    "share_customer" => "share customer",
    "share_order" => "share order",
    "share_stock" => "share stock",
    "active" => "active",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_shop_group",
];


$table->displayTable();
