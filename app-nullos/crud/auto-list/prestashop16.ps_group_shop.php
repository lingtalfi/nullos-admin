<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_group,
id_shop
';


$query = "select
%s
from prestashop16.ps_group_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_group_shop", $query, $fields, ['id_group', 'id_shop']);

$table->title = "Ps group shop";


$table->columnLabels= [
    "id_group" => "id group",
    "id_shop" => "id shop",
];


$table->displayTable();
