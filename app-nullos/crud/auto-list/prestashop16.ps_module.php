<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
name,
active,
version
';


$query = "select
%s
from prestashop16.ps_module
";


$table = CrudModule::getDataTable("prestashop16.ps_module", $query, $fields, ['id_module']);

$table->title = "Ps module";


$table->columnLabels= [
    "id_module" => "id module",
    "name" => "name",
    "active" => "active",
    "version" => "version",
];


$table->hiddenColumns = [
    "id_module",
];


$table->displayTable();
