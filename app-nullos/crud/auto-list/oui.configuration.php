<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
cle,
valeur
';


$query = "select
%s
from oui.configuration
";


$table = CrudModule::getDataTable();

$table->title = "Configuration";


$table->actionColumnsPosition = "right";


$table->columnHeaders = [
    "cle" => "cle",
    "valeur" => "valeur",
];


$table->printTable('oui.configuration', $query, $fields, ['cle']);
