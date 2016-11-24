<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
cle,
valeur
';


$query = "select
%s
from configuration
";


$table = CrudModule::getDataTable();

$table->title = "Configuration";


$table->columnHeaders = [
    "cle" => "cle",
    "valeur" => "valeur",
];


$table->printTable('configuration', $query, $fields, ['cle']);
