<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from oui.styles_musicaux
";


$table = CrudModule::getDataTable();

$table->title = "Styles musicaux";


$table->actionColumnsPosition = "right";


$table->columnHeaders = [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->printTable('oui.styles_musicaux', $query, $fields, ['id']);
