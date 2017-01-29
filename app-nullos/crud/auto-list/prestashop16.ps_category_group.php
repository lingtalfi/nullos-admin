<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_category,
id_group
';


$query = "select
%s
from prestashop16.ps_category_group
";


$table = CrudModule::getDataTable("prestashop16.ps_category_group", $query, $fields, ['id_category', 'id_group']);

$table->title = "Ps category group";


$table->columnLabels= [
    "id_category" => "id category",
    "id_group" => "id group",
];


$table->displayTable();
