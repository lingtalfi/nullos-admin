<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_group_reduction,
id_group,
id_category,
reduction
';


$query = "select
%s
from prestashop16.ps_group_reduction
";


$table = CrudModule::getDataTable("prestashop16.ps_group_reduction", $query, $fields, ['id_group_reduction']);

$table->title = "Ps group reduction";


$table->columnLabels= [
    "id_group_reduction" => "id group reduction",
    "id_group" => "id group",
    "id_category" => "id category",
    "reduction" => "reduction",
];


$table->hiddenColumns = [
    "id_group_reduction",
];


$table->displayTable();
