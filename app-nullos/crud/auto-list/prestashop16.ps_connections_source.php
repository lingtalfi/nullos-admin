<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_connections_source,
id_connections,
http_referer,
request_uri,
keywords,
date_add
';


$query = "select
%s
from prestashop16.ps_connections_source
";


$table = CrudModule::getDataTable("prestashop16.ps_connections_source", $query, $fields, ['id_connections_source']);

$table->title = "Ps connections source";


$table->columnLabels= [
    "id_connections_source" => "id connections source",
    "id_connections" => "id connections",
    "http_referer" => "http referer",
    "request_uri" => "request uri",
    "keywords" => "keywords",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_connections_source",
];


$table->displayTable();
