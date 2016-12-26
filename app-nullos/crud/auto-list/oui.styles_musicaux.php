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


$table = CrudModule::getDataTable("oui.styles_musicaux", $query, $fields, ['id']);

$table->title = "Styles musicaux";


$table->columnLabels= [
    "id" => "id",
    "nom" => "nom",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();
