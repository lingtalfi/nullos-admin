<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
nom
';


$query = "select
%s
from oui.instruments
";


$table = CrudModule::getDataTable("oui.instruments", $query, $fields, ['id']);

$table->title = "Instruments";


$table->columnLabels= [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();
