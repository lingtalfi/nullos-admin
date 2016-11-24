<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from equipe
";


$table = CrudModule::getDataTable();

$table->title = "équipe";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('equipe', $query, $fields, ['id']);
