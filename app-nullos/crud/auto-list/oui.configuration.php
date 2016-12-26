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


$table = CrudModule::getDataTable("oui.configuration", $query, $fields, ['cle']);

$table->title = "Configuration";


$table->columnLabels= [
    "cle" => "cle",
    "valeur" => "valeur",
];


$table->displayTable();
