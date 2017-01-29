<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_employee,
id_shop
';


$query = "select
%s
from prestashop16.ps_employee_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_employee_shop", $query, $fields, ['id_employee', 'id_shop']);

$table->title = "Ps employee shop";


$table->columnLabels= [
    "id_employee" => "id employee",
    "id_shop" => "id shop",
];


$table->displayTable();
