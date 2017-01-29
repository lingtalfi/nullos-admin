<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_stock_mvt_reason,
sign,
date_add,
date_upd,
deleted
';


$query = "select
%s
from prestashop16.ps_stock_mvt_reason
";


$table = CrudModule::getDataTable("prestashop16.ps_stock_mvt_reason", $query, $fields, ['id_stock_mvt_reason']);

$table->title = "Ps stock mvt reason";


$table->columnLabels= [
    "id_stock_mvt_reason" => "id stock mvt reason",
    "sign" => "sign",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_stock_mvt_reason",
];


$table->displayTable();
