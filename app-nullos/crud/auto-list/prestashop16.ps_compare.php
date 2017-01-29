<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_compare,
id_customer
';


$query = "select
%s
from prestashop16.ps_compare
";


$table = CrudModule::getDataTable("prestashop16.ps_compare", $query, $fields, ['id_compare']);

$table->title = "Ps compare";


$table->columnLabels= [
    "id_compare" => "id compare",
    "id_customer" => "id customer",
];


$table->hiddenColumns = [
    "id_compare",
];


$table->displayTable();
