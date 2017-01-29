<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_currency,
name,
iso_code,
iso_code_num,
sign,
blank,
format,
decimals,
conversion_rate,
deleted,
active
';


$query = "select
%s
from prestashop16.ps_currency
";


$table = CrudModule::getDataTable("prestashop16.ps_currency", $query, $fields, ['id_currency']);

$table->title = "Ps currency";


$table->columnLabels= [
    "id_currency" => "id currency",
    "name" => "name",
    "iso_code" => "iso code",
    "iso_code_num" => "iso code num",
    "sign" => "sign",
    "blank" => "blank",
    "format" => "format",
    "decimals" => "decimals",
    "conversion_rate" => "conversion rate",
    "deleted" => "deleted",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_currency",
];


$table->displayTable();
