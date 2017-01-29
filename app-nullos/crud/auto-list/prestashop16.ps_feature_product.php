<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature,
id_product,
id_feature_value
';


$query = "select
%s
from prestashop16.ps_feature_product
";


$table = CrudModule::getDataTable("prestashop16.ps_feature_product", $query, $fields, ['id_feature', 'id_product']);

$table->title = "Ps feature product";


$table->columnLabels= [
    "id_feature" => "id feature",
    "id_product" => "id product",
    "id_feature_value" => "id feature value",
];


$table->displayTable();
