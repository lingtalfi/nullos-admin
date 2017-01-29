<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_profile,
id_module,
view,
configure,
uninstall
';


$query = "select
%s
from prestashop16.ps_module_access
";


$table = CrudModule::getDataTable("prestashop16.ps_module_access", $query, $fields, ['id_profile', 'id_module']);

$table->title = "Ps module access";


$table->columnLabels= [
    "id_profile" => "id profile",
    "id_module" => "id module",
    "view" => "view",
    "configure" => "configure",
    "uninstall" => "uninstall",
];


$table->displayTable();
