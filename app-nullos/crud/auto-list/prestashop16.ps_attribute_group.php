<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute_group,
is_color_group,
group_type,
position
';


$query = "select
%s
from prestashop16.ps_attribute_group
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_group", $query, $fields, ['id_attribute_group']);

$table->title = "Ps attribute group";


$table->columnLabels= [
    "id_attribute_group" => "id attribute group",
    "is_color_group" => "is color group",
    "group_type" => "group type",
    "position" => "position",
];


$table->hiddenColumns = [
    "id_attribute_group",
];


$table->displayTable();
