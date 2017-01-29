<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_timezone,
name
';


$query = "select
%s
from prestashop16.ps_timezone
";


$table = CrudModule::getDataTable("prestashop16.ps_timezone", $query, $fields, ['id_timezone']);

$table->title = "Ps timezone";


$table->columnLabels= [
    "id_timezone" => "id timezone",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_timezone",
];


$table->displayTable();
