<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_profile,
id_tab,
view,
add,
edit,
delete
';


$query = "select
%s
from prestashop16.ps_access
";


$table = CrudModule::getDataTable("prestashop16.ps_access", $query, $fields, ['id_profile', 'id_tab']);

$table->title = "Ps access";


$table->columnLabels= [
    "id_profile" => "id profile",
    "id_tab" => "id tab",
    "view" => "view",
    "add" => "add",
    "edit" => "edit",
    "delete" => "delete",
];


$table->displayTable();
