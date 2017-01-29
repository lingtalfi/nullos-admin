<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature,
indexable
';


$query = "select
%s
from prestashop16.ps_layered_indexable_feature
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_indexable_feature", $query, $fields, ['id_feature']);

$table->title = "Ps layered indexable feature";


$table->columnLabels= [
    "id_feature" => "id feature",
    "indexable" => "indexable",
];


$table->displayTable();
