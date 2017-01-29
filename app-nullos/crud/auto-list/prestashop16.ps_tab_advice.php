<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tab,
id_advice
';


$query = "select
%s
from prestashop16.ps_tab_advice
";


$table = CrudModule::getDataTable("prestashop16.ps_tab_advice", $query, $fields, ['id_tab', 'id_advice']);

$table->title = "Ps tab advice";


$table->columnLabels= [
    "id_tab" => "id tab",
    "id_advice" => "id advice",
];


$table->displayTable();
