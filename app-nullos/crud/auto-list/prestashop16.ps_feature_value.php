<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature_value,
id_feature,
custom
';


$query = "select
%s
from prestashop16.ps_feature_value
";


$table = CrudModule::getDataTable("prestashop16.ps_feature_value", $query, $fields, ['id_feature_value']);

$table->title = "Ps feature value";


$table->columnLabels= [
    "id_feature_value" => "id feature value",
    "id_feature" => "id feature",
    "custom" => "custom",
];


$table->hiddenColumns = [
    "id_feature_value",
];


$table->displayTable();
