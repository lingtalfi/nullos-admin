<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_web_browser,
name
';


$query = "select
%s
from prestashop16.ps_web_browser
";


$table = CrudModule::getDataTable("prestashop16.ps_web_browser", $query, $fields, ['id_web_browser']);

$table->title = "Ps web browser";


$table->columnLabels= [
    "id_web_browser" => "id web browser",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_web_browser",
];


$table->displayTable();
