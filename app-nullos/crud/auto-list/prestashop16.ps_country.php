<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_country,
id_zone,
id_currency,
iso_code,
call_prefix,
active,
contains_states,
need_identification_number,
need_zip_code,
zip_code_format,
display_tax_label
';


$query = "select
%s
from prestashop16.ps_country
";


$table = CrudModule::getDataTable("prestashop16.ps_country", $query, $fields, ['id_country']);

$table->title = "Ps country";


$table->columnLabels= [
    "id_country" => "id country",
    "id_zone" => "id zone",
    "id_currency" => "id currency",
    "iso_code" => "iso code",
    "call_prefix" => "call prefix",
    "active" => "active",
    "contains_states" => "contains states",
    "need_identification_number" => "need identification number",
    "need_zip_code" => "need zip code",
    "zip_code_format" => "zip code format",
    "display_tax_label" => "display tax label",
];


$table->hiddenColumns = [
    "id_country",
];


$table->displayTable();
