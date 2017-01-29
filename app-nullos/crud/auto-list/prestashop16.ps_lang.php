<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_lang,
name,
active,
iso_code,
language_code,
date_format_lite,
date_format_full,
is_rtl
';


$query = "select
%s
from prestashop16.ps_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_lang", $query, $fields, ['id_lang']);

$table->title = "Ps lang";


$table->columnLabels= [
    "id_lang" => "id lang",
    "name" => "name",
    "active" => "active",
    "iso_code" => "iso code",
    "language_code" => "language code",
    "date_format_lite" => "date format lite",
    "date_format_full" => "date format full",
    "is_rtl" => "is rtl",
];


$table->hiddenColumns = [
    "id_lang",
];


$table->displayTable();
