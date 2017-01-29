<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature,
id_shop
';


$query = "select
%s
from prestashop16.ps_feature_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_feature_shop", $query, $fields, ['id_feature', 'id_shop']);

$table->title = "Ps feature shop";


$table->columnLabels= [
    "id_feature" => "id feature",
    "id_shop" => "id shop",
];


$table->displayTable();
