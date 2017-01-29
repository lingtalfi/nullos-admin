<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature,
position
';


$query = "select
%s
from prestashop16.ps_feature
";


$table = CrudModule::getDataTable("prestashop16.ps_feature", $query, $fields, ['id_feature']);

$table->title = "Ps feature";


$table->columnLabels= [
    "id_feature" => "id feature",
    "position" => "position",
];


$table->hiddenColumns = [
    "id_feature",
];


$table->displayTable();
