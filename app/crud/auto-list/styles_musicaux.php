<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from styles_musicaux
";


$table = CrudModule::getDataTable();

$table->title = "Styles musicaux";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('styles_musicaux', $query, $fields, ['id']);
