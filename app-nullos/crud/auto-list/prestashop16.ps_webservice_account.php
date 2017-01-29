<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_webservice_account,
key,
description,
class_name,
is_module,
module_name,
active
';


$query = "select
%s
from prestashop16.ps_webservice_account
";


$table = CrudModule::getDataTable("prestashop16.ps_webservice_account", $query, $fields, ['id_webservice_account']);

$table->title = "Ps webservice account";


$table->columnLabels= [
    "id_webservice_account" => "id webservice account",
    "key" => "key",
    "description" => "description",
    "class_name" => "class name",
    "is_module" => "is module",
    "module_name" => "module name",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_webservice_account",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();
