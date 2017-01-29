<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_meta,
page,
configurable
';


$query = "select
%s
from prestashop16.ps_meta
";


$table = CrudModule::getDataTable("prestashop16.ps_meta", $query, $fields, ['id_meta']);

$table->title = "Ps meta";


$table->columnLabels= [
    "id_meta" => "id meta",
    "page" => "page",
    "configurable" => "configurable",
];


$table->hiddenColumns = [
    "id_meta",
];


$table->displayTable();
