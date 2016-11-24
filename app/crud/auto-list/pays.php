<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from pays
";


$table = CrudModule::getDataTable();

$table->title = "Pays";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('pays', $query, $fields, ['id']);
