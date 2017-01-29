<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_info,
id_shop
';


$query = "select
%s
from prestashop16.ps_info
";


$table = CrudModule::getDataTable("prestashop16.ps_info", $query, $fields, ['id_info']);

$table->title = "Ps info";


$table->columnLabels= [
    "id_info" => "id info",
    "id_shop" => "id shop",
];


$table->hiddenColumns = [
    "id_info",
];


$table->displayTable();
