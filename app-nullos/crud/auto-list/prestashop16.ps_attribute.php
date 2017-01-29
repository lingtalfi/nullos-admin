<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_attribute_group,
color,
position
';


$query = "select
%s
from prestashop16.ps_attribute
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute", $query, $fields, ['id_attribute']);

$table->title = "Ps attribute";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_attribute_group" => "id attribute group",
    "color" => "color",
    "position" => "position",
];


$table->hiddenColumns = [
    "id_attribute",
];


$table->displayTable();
