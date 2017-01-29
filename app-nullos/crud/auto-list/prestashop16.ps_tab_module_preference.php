<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tab_module_preference,
id_employee,
id_tab,
module
';


$query = "select
%s
from prestashop16.ps_tab_module_preference
";


$table = CrudModule::getDataTable("prestashop16.ps_tab_module_preference", $query, $fields, ['id_tab_module_preference']);

$table->title = "Ps tab module preference";


$table->columnLabels= [
    "id_tab_module_preference" => "id tab module preference",
    "id_employee" => "id employee",
    "id_tab" => "id tab",
    "module" => "module",
];


$table->hiddenColumns = [
    "id_tab_module_preference",
];


$table->displayTable();
