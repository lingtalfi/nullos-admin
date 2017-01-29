<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_warehouse,
id_currency,
id_address,
id_employee,
reference,
name,
management_type,
deleted
';


$query = "select
%s
from prestashop16.ps_warehouse
";


$table = CrudModule::getDataTable("prestashop16.ps_warehouse", $query, $fields, ['id_warehouse']);

$table->title = "Ps warehouse";


$table->columnLabels= [
    "id_warehouse" => "id warehouse",
    "id_currency" => "id currency",
    "id_address" => "id address",
    "id_employee" => "id employee",
    "reference" => "reference",
    "name" => "name",
    "management_type" => "management type",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_warehouse",
];


$table->displayTable();
