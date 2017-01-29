<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_alias,
alias,
search,
active
';


$query = "select
%s
from prestashop16.ps_alias
";


$table = CrudModule::getDataTable("prestashop16.ps_alias", $query, $fields, ['id_alias']);

$table->title = "Ps alias";


$table->columnLabels= [
    "id_alias" => "id alias",
    "alias" => "alias",
    "search" => "search",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_alias",
];


$table->displayTable();
