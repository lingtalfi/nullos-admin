<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_connections,
id_page,
time_start,
time_end
';


$query = "select
%s
from prestashop16.ps_connections_page
";


$table = CrudModule::getDataTable("prestashop16.ps_connections_page", $query, $fields, ['id_connections', 'id_page', 'time_start']);

$table->title = "Ps connections page";


$table->columnLabels= [
    "id_connections" => "id connections",
    "id_page" => "id page",
    "time_start" => "time start",
    "time_end" => "time end",
];


$table->displayTable();
