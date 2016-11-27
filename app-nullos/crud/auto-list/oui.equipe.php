<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from oui.equipe
";


$table = CrudModule::getDataTable();

$table->title = "Equipe";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('oui.equipe', $query, $fields, ['id']);
