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


$table = CrudModule::getDataTable("oui.equipe", $query, $fields, ['id']);

$table->title = "Equipe";


$table->columnLabels= [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();
