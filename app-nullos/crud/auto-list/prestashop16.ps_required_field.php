<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_required_field,
object_name,
field_name
';


$query = "select
%s
from prestashop16.ps_required_field
";


$table = CrudModule::getDataTable("prestashop16.ps_required_field", $query, $fields, ['id_required_field']);

$table->title = "Ps required field";


$table->columnLabels= [
    "id_required_field" => "id required field",
    "object_name" => "object name",
    "field_name" => "field name",
];


$table->hiddenColumns = [
    "id_required_field",
];


$table->displayTable();
