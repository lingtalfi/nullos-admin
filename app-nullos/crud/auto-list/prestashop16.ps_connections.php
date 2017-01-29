<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_connections,
id_shop_group,
id_shop,
id_guest,
id_page,
ip_address,
date_add,
http_referer
';


$query = "select
%s
from prestashop16.ps_connections
";


$table = CrudModule::getDataTable("prestashop16.ps_connections", $query, $fields, ['id_connections']);

$table->title = "Ps connections";


$table->columnLabels= [
    "id_connections" => "id connections",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_guest" => "id guest",
    "id_page" => "id page",
    "ip_address" => "ip address",
    "date_add" => "date add",
    "http_referer" => "http referer",
];


$table->hiddenColumns = [
    "id_connections",
];


$table->displayTable();
