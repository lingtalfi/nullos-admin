<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customer,
id_group
';


$query = "select
%s
from prestashop16.ps_customer_group
";


$table = CrudModule::getDataTable("prestashop16.ps_customer_group", $query, $fields, ['id_customer', 'id_group']);

$table->title = "Ps customer group";


$table->columnLabels= [
    "id_customer" => "id customer",
    "id_group" => "id group",
];


$table->displayTable();
