<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_search_engine,
server,
getvar
';


$query = "select
%s
from prestashop16.ps_search_engine
";


$table = CrudModule::getDataTable("prestashop16.ps_search_engine", $query, $fields, ['id_search_engine']);

$table->title = "Ps search engine";


$table->columnLabels= [
    "id_search_engine" => "id search engine",
    "server" => "server",
    "getvar" => "getvar",
];


$table->hiddenColumns = [
    "id_search_engine",
];


$table->displayTable();
