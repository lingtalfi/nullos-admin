<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute_group,
indexable
';


$query = "select
%s
from prestashop16.ps_layered_indexable_attribute_group
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_indexable_attribute_group", $query, $fields, ['id_attribute_group']);

$table->title = "Ps layered indexable attribute group";


$table->columnLabels= [
    "id_attribute_group" => "id attribute group",
    "indexable" => "indexable",
];


$table->displayTable();
