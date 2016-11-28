<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from oui.pays
";


$table = CrudModule::getDataTable();

$table->title = "Pays";


$table->actionColumnsPosition = "right";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('oui.pays', $query, $fields, ['id']);
