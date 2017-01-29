<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module_preference,
id_employee,
module,
interest,
favorite
';


$query = "select
%s
from prestashop16.ps_module_preference
";


$table = CrudModule::getDataTable("prestashop16.ps_module_preference", $query, $fields, ['id_module_preference']);

$table->title = "Ps module preference";


$table->columnLabels= [
    "id_module_preference" => "id module preference",
    "id_employee" => "id employee",
    "module" => "module",
    "interest" => "interest",
    "favorite" => "favorite",
];


$table->hiddenColumns = [
    "id_module_preference",
];


$table->displayTable();
