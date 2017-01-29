<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_webservice_account,
id_shop
';


$query = "select
%s
from prestashop16.ps_webservice_account_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_webservice_account_shop", $query, $fields, ['id_webservice_account', 'id_shop']);

$table->title = "Ps webservice account shop";


$table->columnLabels= [
    "id_webservice_account" => "id webservice account",
    "id_shop" => "id shop",
];


$table->displayTable();
