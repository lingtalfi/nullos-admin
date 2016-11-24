<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from instruments
";


$table = CrudModule::getDataTable();

$table->title = "Instruments";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('instruments', $query, $fields, ['id']);
