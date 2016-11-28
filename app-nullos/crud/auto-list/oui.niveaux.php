<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from oui.niveaux
";


$table = CrudModule::getDataTable();

$table->title = "Niveaux";


$table->actionColumnsPosition = "right";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('oui.niveaux', $query, $fields, ['id']);
