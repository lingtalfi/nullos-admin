<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_country,
format
';


$query = "select
%s
from prestashop16.ps_address_format
";


$table = CrudModule::getDataTable("prestashop16.ps_address_format", $query, $fields, ['id_country']);

$table->title = "Ps address format";


$table->columnLabels= [
    "id_country" => "id country",
    "format" => "format",
];


$table->displayTable();
