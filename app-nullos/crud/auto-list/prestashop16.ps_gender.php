<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_gender,
type
';


$query = "select
%s
from prestashop16.ps_gender
";


$table = CrudModule::getDataTable("prestashop16.ps_gender", $query, $fields, ['id_gender']);

$table->title = "Ps gender";


$table->columnLabels= [
    "id_gender" => "id gender",
    "type" => "type",
];


$table->hiddenColumns = [
    "id_gender",
];


$table->displayTable();
