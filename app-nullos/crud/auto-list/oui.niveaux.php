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


$table = CrudModule::getDataTable("oui.niveaux", $query, $fields, ['id']);

$table->title = "Niveaux";


$table->columnLabels= [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();
