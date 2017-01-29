<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms,
id_shop
';


$query = "select
%s
from prestashop16.ps_cms_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_shop", $query, $fields, ['id_cms', 'id_shop']);

$table->title = "Ps cms shop";


$table->columnLabels= [
    "id_cms" => "id cms",
    "id_shop" => "id shop",
];


$table->displayTable();
