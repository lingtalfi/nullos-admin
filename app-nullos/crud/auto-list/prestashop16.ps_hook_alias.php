<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_hook_alias,
alias,
name
';


$query = "select
%s
from prestashop16.ps_hook_alias
";


$table = CrudModule::getDataTable("prestashop16.ps_hook_alias", $query, $fields, ['id_hook_alias']);

$table->title = "Ps hook alias";


$table->columnLabels= [
    "id_hook_alias" => "id hook alias",
    "alias" => "alias",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_hook_alias",
];


$table->displayTable();
