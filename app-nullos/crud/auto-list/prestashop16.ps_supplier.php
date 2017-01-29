<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supplier,
name,
date_add,
date_upd,
active
';


$query = "select
%s
from prestashop16.ps_supplier
";


$table = CrudModule::getDataTable("prestashop16.ps_supplier", $query, $fields, ['id_supplier']);

$table->title = "Ps supplier";


$table->columnLabels= [
    "id_supplier" => "id supplier",
    "name" => "name",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_supplier",
];


$table->displayTable();
