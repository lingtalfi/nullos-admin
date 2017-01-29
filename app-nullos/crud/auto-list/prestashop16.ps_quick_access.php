<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_quick_access,
new_window,
link
';


$query = "select
%s
from prestashop16.ps_quick_access
";


$table = CrudModule::getDataTable("prestashop16.ps_quick_access", $query, $fields, ['id_quick_access']);

$table->title = "Ps quick access";


$table->columnLabels= [
    "id_quick_access" => "id quick access",
    "new_window" => "new window",
    "link" => "link",
];


$table->hiddenColumns = [
    "id_quick_access",
];


$table->displayTable();
