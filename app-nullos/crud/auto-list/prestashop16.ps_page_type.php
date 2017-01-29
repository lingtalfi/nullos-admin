<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_page_type,
name
';


$query = "select
%s
from prestashop16.ps_page_type
";


$table = CrudModule::getDataTable("prestashop16.ps_page_type", $query, $fields, ['id_page_type']);

$table->title = "Ps page type";


$table->columnLabels= [
    "id_page_type" => "id page type",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_page_type",
];


$table->displayTable();
