<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_webservice_permission,
resource,
method,
id_webservice_account
';


$query = "select
%s
from prestashop16.ps_webservice_permission
";


$table = CrudModule::getDataTable("prestashop16.ps_webservice_permission", $query, $fields, ['id_webservice_permission']);

$table->title = "Ps webservice permission";


$table->columnLabels= [
    "id_webservice_permission" => "id webservice permission",
    "resource" => "resource",
    "method" => "method",
    "id_webservice_account" => "id webservice account",
];


$table->hiddenColumns = [
    "id_webservice_permission",
];


$table->displayTable();
