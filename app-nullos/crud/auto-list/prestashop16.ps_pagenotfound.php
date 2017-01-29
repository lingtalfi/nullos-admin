<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_pagenotfound,
id_shop,
id_shop_group,
request_uri,
http_referer,
date_add
';


$query = "select
%s
from prestashop16.ps_pagenotfound
";


$table = CrudModule::getDataTable("prestashop16.ps_pagenotfound", $query, $fields, ['id_pagenotfound']);

$table->title = "Ps pagenotfound";


$table->columnLabels= [
    "id_pagenotfound" => "id pagenotfound",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "request_uri" => "request uri",
    "http_referer" => "http referer",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_pagenotfound",
];


$table->displayTable();
