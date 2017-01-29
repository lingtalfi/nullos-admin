<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_memcached_server,
ip,
port,
weight
';


$query = "select
%s
from prestashop16.ps_memcached_servers
";


$table = CrudModule::getDataTable("prestashop16.ps_memcached_servers", $query, $fields, ['id_memcached_server']);

$table->title = "Ps memcached servers";


$table->columnLabels= [
    "id_memcached_server" => "id memcached server",
    "ip" => "ip",
    "port" => "port",
    "weight" => "weight",
];


$table->hiddenColumns = [
    "id_memcached_server",
];


$table->displayTable();
