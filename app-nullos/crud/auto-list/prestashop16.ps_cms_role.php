<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_role,
name,
id_cms
';


$query = "select
%s
from prestashop16.ps_cms_role
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_role", $query, $fields, ['id_cms_role', 'id_cms']);

$table->title = "Ps cms role";


$table->columnLabels= [
    "id_cms_role" => "id cms role",
    "name" => "name",
    "id_cms" => "id cms",
];


$table->hiddenColumns = [
    "id_cms_role",
];


$table->displayTable();
