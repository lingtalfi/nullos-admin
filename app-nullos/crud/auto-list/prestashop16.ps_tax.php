<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tax,
rate,
active,
deleted
';


$query = "select
%s
from prestashop16.ps_tax
";


$table = CrudModule::getDataTable("prestashop16.ps_tax", $query, $fields, ['id_tax']);

$table->title = "Ps tax";


$table->columnLabels= [
    "id_tax" => "id tax",
    "rate" => "rate",
    "active" => "active",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_tax",
];


$table->displayTable();
