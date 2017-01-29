<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_module,
id_shop,
id_hook,
position
';


$query = "select
%s
from prestashop16.ps_hook_module
";


$table = CrudModule::getDataTable("prestashop16.ps_hook_module", $query, $fields, ['id_module', 'id_hook', 'id_shop']);

$table->title = "Ps hook module";


$table->columnLabels= [
    "id_module" => "id module",
    "id_shop" => "id shop",
    "id_hook" => "id hook",
    "position" => "position",
];


$table->displayTable();
