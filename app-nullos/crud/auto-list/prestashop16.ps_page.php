<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_page,
id_page_type,
id_object
';


$query = "select
%s
from prestashop16.ps_page
";


$table = CrudModule::getDataTable("prestashop16.ps_page", $query, $fields, ['id_page']);

$table->title = "Ps page";


$table->columnLabels= [
    "id_page" => "id page",
    "id_page_type" => "id page type",
    "id_object" => "id object",
];


$table->hiddenColumns = [
    "id_page",
];


$table->displayTable();
