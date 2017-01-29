<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_hook_module_exceptions,
id_shop,
id_module,
id_hook,
file_name
';


$query = "select
%s
from prestashop16.ps_hook_module_exceptions
";


$table = CrudModule::getDataTable("prestashop16.ps_hook_module_exceptions", $query, $fields, ['id_hook_module_exceptions']);

$table->title = "Ps hook module exceptions";


$table->columnLabels= [
    "id_hook_module_exceptions" => "id hook module exceptions",
    "id_shop" => "id shop",
    "id_module" => "id module",
    "id_hook" => "id hook",
    "file_name" => "file name",
];


$table->hiddenColumns = [
    "id_hook_module_exceptions",
];


$table->displayTable();
