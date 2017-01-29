<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_zone,
name,
active
';


$query = "select
%s
from prestashop16.ps_zone
";


$table = CrudModule::getDataTable("prestashop16.ps_zone", $query, $fields, ['id_zone']);

$table->title = "Ps zone";


$table->columnLabels= [
    "id_zone" => "id zone",
    "name" => "name",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_zone",
];


$table->displayTable();
