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


$table = CrudModule::getDataTable("oui.pays", $query, $fields, ['id']);

$table->title = "Pays";


$table->columnLabels= [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();
