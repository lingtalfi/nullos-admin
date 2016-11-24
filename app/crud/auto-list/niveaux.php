<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from niveaux
";


$table = CrudModule::getDataTable();

$table->title = "Niveaux";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('niveaux', $query, $fields, ['id']);
