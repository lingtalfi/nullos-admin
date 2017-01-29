<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_statssearch,
id_shop,
id_shop_group,
keywords,
results,
date_add
';


$query = "select
%s
from prestashop16.ps_statssearch
";


$table = CrudModule::getDataTable("prestashop16.ps_statssearch", $query, $fields, ['id_statssearch']);

$table->title = "Ps statssearch";


$table->columnLabels= [
    "id_statssearch" => "id statssearch",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "keywords" => "keywords",
    "results" => "results",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_statssearch",
];


$table->displayTable();
