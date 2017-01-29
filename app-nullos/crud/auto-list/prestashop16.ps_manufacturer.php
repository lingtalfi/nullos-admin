<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_manufacturer,
name,
date_add,
date_upd,
active
';


$query = "select
%s
from prestashop16.ps_manufacturer
";


$table = CrudModule::getDataTable("prestashop16.ps_manufacturer", $query, $fields, ['id_manufacturer']);

$table->title = "Ps manufacturer";


$table->columnLabels= [
    "id_manufacturer" => "id manufacturer",
    "name" => "name",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_manufacturer",
];


$table->displayTable();
