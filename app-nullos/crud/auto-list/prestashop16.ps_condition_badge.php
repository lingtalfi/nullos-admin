<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_condition,
id_badge
';


$query = "select
%s
from prestashop16.ps_condition_badge
";


$table = CrudModule::getDataTable("prestashop16.ps_condition_badge", $query, $fields, ['id_condition', 'id_badge']);

$table->title = "Ps condition badge";


$table->columnLabels= [
    "id_condition" => "id condition",
    "id_badge" => "id badge",
];


$table->displayTable();
