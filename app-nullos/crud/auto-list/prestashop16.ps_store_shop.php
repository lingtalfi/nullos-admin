<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_store,
id_shop
';


$query = "select
%s
from prestashop16.ps_store_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_store_shop", $query, $fields, ['id_store', 'id_shop']);

$table->title = "Ps store shop";


$table->columnLabels= [
    "id_store" => "id store",
    "id_shop" => "id shop",
];


$table->displayTable();
