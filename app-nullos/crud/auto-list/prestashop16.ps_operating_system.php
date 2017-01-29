<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_operating_system,
name
';


$query = "select
%s
from prestashop16.ps_operating_system
";


$table = CrudModule::getDataTable("prestashop16.ps_operating_system", $query, $fields, ['id_operating_system']);

$table->title = "Ps operating system";


$table->columnLabels= [
    "id_operating_system" => "id operating system",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_operating_system",
];


$table->displayTable();
