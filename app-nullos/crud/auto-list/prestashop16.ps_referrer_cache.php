<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_connections_source,
id_referrer
';


$query = "select
%s
from prestashop16.ps_referrer_cache
";


$table = CrudModule::getDataTable("prestashop16.ps_referrer_cache", $query, $fields, ['id_connections_source', 'id_referrer']);

$table->title = "Ps referrer cache";


$table->columnLabels= [
    "id_connections_source" => "id connections source",
    "id_referrer" => "id referrer",
];


$table->displayTable();
