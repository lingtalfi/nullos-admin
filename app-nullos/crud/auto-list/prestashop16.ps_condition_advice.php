<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_condition,
id_advice,
display
';


$query = "select
%s
from prestashop16.ps_condition_advice
";


$table = CrudModule::getDataTable("prestashop16.ps_condition_advice", $query, $fields, ['id_condition', 'id_advice']);

$table->title = "Ps condition advice";


$table->columnLabels= [
    "id_condition" => "id condition",
    "id_advice" => "id advice",
    "display" => "display",
];


$table->displayTable();
