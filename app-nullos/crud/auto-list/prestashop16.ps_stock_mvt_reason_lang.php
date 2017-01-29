<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_stock_mvt_reason,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_stock_mvt_reason_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_stock_mvt_reason_lang", $query, $fields, ['id_stock_mvt_reason', 'id_lang']);

$table->title = "Ps stock mvt reason lang";


$table->columnLabels= [
    "id_stock_mvt_reason" => "id stock mvt reason",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();
